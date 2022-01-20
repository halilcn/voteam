<?php

namespace App\Jobs;

use App\Models\Team;
use App\Models\TeamUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;

class DeleteUserOfTeam implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Team $team, public TeamUser $teamUser)
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
        $team = $this->team;
        $teamUser = $this->teamUser;

        DB::transaction(function () use ($team, $teamUser) {
            $teamUser->userPower()->delete();
            $team->votes()->activeVotes()->each(
                function ($activeVote) use ($teamUser) {
                    $activeVote->votedUsers()->where('user_id', $teamUser->user_id)->delete();
                }
            );
            $team->votes()->activeVotes()->where('user_id', $teamUser->user_id)->each(
                function ($activeVote) use ($teamUser) {
                    $activeVote->votedUsers()->delete();
                }
            );
            $team->votes()->activeVotes()->where('user_id', $teamUser->user_id)->delete();
            $teamUser->delete();
        });
    }
}
