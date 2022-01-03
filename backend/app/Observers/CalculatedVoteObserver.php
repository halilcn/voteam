<?php

namespace App\Observers;

use App\Jobs\SendCalculatedVoteEmail;
use App\Jobs\TeamNotifications\CalculatedVoteNotification;
use App\Models\CalculatedVote;
use App\Models\Vote;
use Carbon\Carbon;

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
        $team = $calculatedVote->vote->team;
        $users = $team->users()->pluck('email')->toArray();
        $voteTitle = $calculatedVote->vote->title;

        if (!$calculatedVote->vote->end_date->isPast()) {
            $calculatedVote->vote()->update(['end_date' => Carbon::now()]);
        }

        SendCalculatedVoteEmail::dispatch($users, $voteTitle);
        CalculatedVoteNotification::dispatch($team, $voteTitle);
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
