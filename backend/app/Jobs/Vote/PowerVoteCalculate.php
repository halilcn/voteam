<?php

namespace App\Jobs\Vote;

use App\Models\TeamUser;
use App\Models\TeamUserPower;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PowerVoteCalculate implements ShouldQueue
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
                'message' => 'Güç Oylaması Tamamlandı !',
            ],
            User::$LANGUAGES['EN'] => [
                'status' => true,
                'message' => 'Power Vote Completed !',
            ]
        ];
        $negativeStatusData = [
            User::$LANGUAGES['TR'] => [
                'status' => false,
                'info_message' => 'Yeterli katılım sağlanılmadı !',
            ],
            User::$LANGUAGES['EN'] => [
                'status' => false,
                'info_message' => 'Not enough participation !',
            ]
        ];

        $teamId = $this->vote->team->id;
        $votedUsersCount = $this->vote->votedUsers()->count();
        $teamUsersId = collect(TeamUser::where('team_id', $teamId)->pluck('id'));

        if ($this->vote->calculation()->exists()) {
            return;
        }

        $percentageOfVotedUsers = $votedUsersCount * (100 / $this->vote->team->users()->count());
        if ($percentageOfVotedUsers < Vote::$MINIMUM_VOTED_USERS_PERCENTAGE) {
            if (!$this->vote->team->powerTypeVote()->exists()) {
                $this->vote->votedUsers()->delete();
                $this->vote->delete();
                return;
            }

            $data = $negativeStatusData;
        } else {
            $data = $successStatusData;

            collect($this->vote->votedUsers)
                ->map(function ($votedUser) {
                    return $votedUser['answer'];
                })
                ->collapse()
                ->groupBy('team_user_id')
                ->map(function ($userAnswer) {
                    return collect($userAnswer)
                        ->transform(function ($answer) {
                            return $answer['power'];
                        })
                        ->sum();
                })
                ->each(function ($totalUserPower, $teamUserId) use ($votedUsersCount, $teamUsersId) {
                    if ($teamUsersId->contains($teamUserId)) {
                        TeamUserPower::updateOrCreate(
                            ['team_user_id' => $teamUserId],
                            ['power' => ($totalUserPower / $votedUsersCount)]
                        );
                    } else {
                        Log::info("Power Vote Calculate warning !");
                    }
                });
        }

        $this->vote->calculation()->create(['data' => $data]);
    }
}
