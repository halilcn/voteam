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
        $teamId = $this->vote->team->id;
        $votedUsersCount = $this->vote->votedUsers()->count();
        $teamUsersId = collect(TeamUser::where('team_id', $teamId)->pluck('id'));

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

        $this->vote->calculation()->create([
                                               'data' => [
                                                   User::$LANGUAGES['TR'] => [
                                                       'message' => 'Güç oylaması tamamlandı',
                                                   ],
                                                   User::$LANGUAGES['EN'] => [
                                                       'message' => 'Power vote completed',
                                                   ]
                                               ]
                                           ]);
    }
}
