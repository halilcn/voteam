<?php

namespace App\Observers;

use App\Jobs\Vote\CalculateVote;
use App\Jobs\Vote\DoubleVoteCalculate;
use App\Jobs\Vote\MultipleVoteCalculate;
use App\Jobs\Vote\PowerVoteCalculate;
use App\Models\Vote;
use App\Models\VotedUser;
use Illuminate\Support\Carbon;

class VotedUserObserver
{
    /**
     * Handle the VotedUser "created" event.
     *
     * @param  \App\Models\VotedUser  $votedUser
     * @return void
     */
    public function created(VotedUser $votedUser)
    {
        $countUsersOfTeam = $votedUser->vote->team->users()->count();
        $countVotedUsers = VotedUser::where('vote_id', $votedUser->vote_id)->count();

        if ($countUsersOfTeam == $countVotedUsers) {
            CalculateVote::dispatchSync($votedUser->vote);
            $votedUser->vote()->update(['all_users_voted' => true]);
        }
    }

    /**
     * Handle the VotedUser "updated" event.
     *
     * @param  \App\Models\VotedUser  $votedUser
     * @return void
     */
    public function updated(VotedUser $votedUser)
    {
        //
    }

    /**
     * Handle the VotedUser "deleted" event.
     *
     * @param  \App\Models\VotedUser  $votedUser
     * @return void
     */
    public function deleted(VotedUser $votedUser)
    {
        //
    }

    /**
     * Handle the VotedUser "restored" event.
     *
     * @param  \App\Models\VotedUser  $votedUser
     * @return void
     */
    public function restored(VotedUser $votedUser)
    {
        //
    }

    /**
     * Handle the VotedUser "force deleted" event.
     *
     * @param  \App\Models\VotedUser  $votedUser
     * @return void
     */
    public function forceDeleted(VotedUser $votedUser)
    {
        //
    }
}
