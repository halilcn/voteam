<?php

namespace App\Observers;

use App\Jobs\SendCalculatedVoteEmail;
use App\Models\CalculatedVote;

class CalculatedVoteObserver
{
    /**
     * Handle the CalculatedVote "created" event.
     *
     * @param  \App\Models\CalculatedVote  $calculatedVote
     * @return void
     */
    public function created(CalculatedVote $calculatedVote)
    {
        $users = $calculatedVote->vote->team->users()->pluck('email')->toArray();
        $voteTitle = $calculatedVote->vote->title;
        SendCalculatedVoteEmail::dispatch($users, $voteTitle);


        //$calculatedVote->vote->type
    }

    /**
     * Handle the CalculatedVote "updated" event.
     *
     * @param  \App\Models\CalculatedVote  $calculatedVote
     * @return void
     */
    public function updated(CalculatedVote $calculatedVote)
    {
        //
    }

    /**
     * Handle the CalculatedVote "deleted" event.
     *
     * @param  \App\Models\CalculatedVote  $calculatedVote
     * @return void
     */
    public function deleted(CalculatedVote $calculatedVote)
    {
        //
    }

    /**
     * Handle the CalculatedVote "restored" event.
     *
     * @param  \App\Models\CalculatedVote  $calculatedVote
     * @return void
     */
    public function restored(CalculatedVote $calculatedVote)
    {
        //
    }

    /**
     * Handle the CalculatedVote "force deleted" event.
     *
     * @param  \App\Models\CalculatedVote  $calculatedVote
     * @return void
     */
    public function forceDeleted(CalculatedVote $calculatedVote)
    {
        //
    }
}
