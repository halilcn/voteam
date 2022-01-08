<?php

namespace App\Observers;

use App\Jobs\SendVoteCreatedEmail;
use App\Jobs\TeamNotifications\VoteCreatedNotification;
use App\Jobs\Vote\CalculateVote;
use App\Jobs\Vote\DoubleVoteCalculate;
use App\Jobs\Vote\MultipleVoteCalculate;
use App\Jobs\Vote\PowerVoteCalculate;
use App\Models\TeamNotification;
use App\Models\Vote;
use Illuminate\Support\Facades\Notification;

class VoteObserver
{
    /**
     * @param  Vote  $vote
     */
    public function creating(Vote $vote)
    {
        $vote->user_id = request()->user()->id;
    }

    /**
     * Handle the Vote "created" event.
     *
     * @param  \App\Models\Vote  $vote
     * @return void
     */
    public function created(Vote $vote)
    {
        VoteCreatedNotification::dispatch($vote->team, $vote->title);
        SendVoteCreatedEmail::dispatch($vote);
        CalculateVote::dispatchSync($vote, $vote->end_date->diffInSeconds(now()));
    }

    /**
     * Handle the Vote "updated" event.
     *
     * @param  \App\Models\Vote  $vote
     * @return void
     */
    public function updated(Vote $vote)
    {
        //
    }

    /**
     * Handle the Vote "deleted" event.
     *
     * @param  \App\Models\Vote  $vote
     * @return void
     */
    public function deleted(Vote $vote)
    {
        //
    }

    /**
     * Handle the Vote "restored" event.
     *
     * @param  \App\Models\Vote  $vote
     * @return void
     */
    public function restored(Vote $vote)
    {
        //
    }

    /**
     * Handle the Vote "force deleted" event.
     *
     * @param  \App\Models\Vote  $vote
     * @return void
     */
    public function forceDeleted(Vote $vote)
    {
        //
    }
}
