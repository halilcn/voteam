<?php

namespace App\Jobs\Vote;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MultipleVoteCalculate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Vote $vote)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->vote->calculation()->exists()) {
            return;
        }

        $successStatusData = [
            User::$LANGUAGES['TR'] => [
                'status' => true,
                'message' => 'Oylama Sonuçlandı !'
            ],
            User::$LANGUAGES['EN'] => [
                'status' => true,
                'message' => 'Vote Completed !'
            ]
        ];
        $negativeStatusData = [
            User::$LANGUAGES['TR'] => [
                'status' => false,
                'message' => 'Oylama Reddedildi !',
                'info_message' => 'Yeterli katılım sağlanılmadı'
            ],
            User::$LANGUAGES['EN'] => [
                'status' => false,
                'message' => 'Voting Rejected !',
                'info_message' => 'Not enough participation'
            ]
        ];

        $votedUsers = $this
            ->vote
            ->votedUsers()
            ->select('user_id', 'vote_id', 'answer')
            ->get();

        $powerOfUsers = $this
            ->vote
            ->team()
            ->with('users.member.userPower')
            ->first()
            ->users
            ->map(function ($user) {
                $teamUser = [];

                $teamUser['user_id'] = $user->id;
                $teamUser['power'] = $user->member->userPower->power;

                return $teamUser;
            });

        $percentageOfVotedUsers = $votedUsers->count() * (100 / $powerOfUsers->count());

        if ($percentageOfVotedUsers < Vote::$MINIMUM_VOTED_USERS_PERCENTAGE) {
            $calculateData = $negativeStatusData;
        } else {
            $totalPowersWithAnswers = collect();
            foreach ($votedUsers as $votedUser) {
                $TEXT_OPTION_TYPE = Vote::$OPTIONS_TYPES['TEXT'];

                $answer = $votedUser['answer'];
                $answerType = $answer['type'];
                $answerOptionType = $answerType == $TEXT_OPTION_TYPE ? 'message' : 'path';

                $hasAnswer = $totalPowersWithAnswers
                    ->where('type', $answerType)
                    ->where($answerOptionType, $answer[$answerOptionType])
                    ->first();

                if (!$hasAnswer) {
                    $totalPowersWithAnswers->push(array_merge($answer, ['total_power' => 0]));
                }

                $power = $powerOfUsers->where('user_id', $votedUser['user_id'])->first()['power'];
                $totalPowersWithAnswers = $totalPowersWithAnswers
                    ->map(function ($mapAnswer) use ($answer, $power, $TEXT_OPTION_TYPE) {
                        if ($mapAnswer['type'] === $answer['type']) {
                            $optionType = $mapAnswer['type'] === $TEXT_OPTION_TYPE ? 'message' : 'path';

                            if ($mapAnswer[$optionType] === $answer[$optionType]) {
                                $mapAnswer['total_power'] += $power;
                            }
                        }

                        return $mapAnswer;
                    });
            }

            $highestPowerOption = $totalPowersWithAnswers->sortByDesc('total_power')->first();

            $calculateData = collect($successStatusData)->map(function ($item) use ($highestPowerOption) {
                $item['selected_option'] = collect($highestPowerOption)->except('total_power');
                return $item;
            });
        }

        $this->vote->calculation()->create(['data' => $calculateData]);
    }
}
