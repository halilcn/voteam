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

class DoubleVoteCalculate implements ShouldQueue
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
        $successStatusData = [
            User::$LANGUAGES['TR'] => [
                'status' => true,
                'message' => 'Oylama Kabul Edildi !'
            ],
            User::$LANGUAGES['EN'] => [
                'status' => true,
                'message' => 'Voting Accepted !'
            ]
        ];
        $negativeStatusData = [
            User::$LANGUAGES['TR'] => [
                'status' => false,
                'message' => 'Oylama Reddedildi !'
            ],
            User::$LANGUAGES['EN'] => [
                'status' => false,
                'message' => 'Voting Rejected !'
            ]
        ];

        if ($this->vote->calculation()->exists()) {
            return;
        }

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

        $calculateData = collect();
        if ($percentageOfVotedUsers < Vote::$MINIMUM_VOTED_USERS_PERCENTAGE) {
            $addedInfoMessageData = collect($negativeStatusData)->map(function ($data, $keyLang) {
                $data['info_message'] = $keyLang === User::$LANGUAGES['TR']
                    ? 'Yeterli katılım sağlanılmadı'
                    : 'Not enough participation';

                return $data;
            });

            $calculateData->push($addedInfoMessageData);
        } else {
            $totalPowersOfAnswers = [
                'true' => 0,
                'false' => 0
            ];

            foreach ($votedUsers as $votedUser) {
                $power = $powerOfUsers->where('user_id', $votedUser['user_id'])->first()['power'];
                $answer = $votedUser['answer']['answer'];

                $answer
                    ? $totalPowersOfAnswers['true'] += $power
                    : $totalPowersOfAnswers['false'] += $power;
            }

            $calculateData->push(
                $totalPowersOfAnswers['true'] >= $totalPowersOfAnswers['false']
                    ? $successStatusData
                    : $negativeStatusData
            );
        }

        $this->vote->calculation()->create(['data' => $calculateData->collapse()]);
    }
}
