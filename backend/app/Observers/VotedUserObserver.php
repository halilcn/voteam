<?php

namespace App\Observers;

use App\Jobs\Vote\PowerVoteCalculate;
use App\Models\Vote;
use App\Models\VotedUser;

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
            if ($votedUser->vote->type === Vote::$TYPES['POWER']) {
                PowerVoteCalculate::dispatch($votedUser->vote);
            }

            //TODO: power type vote olduğunda hesaplamalar nasıl olacak ? Bir job ?
            //TODO: Buraya notification eklemek gerekli mi ? Vote sonuçlandı diye
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
