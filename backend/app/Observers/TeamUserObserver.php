<?php

namespace App\Observers;

use App\Jobs\TeamNotifications\NewMemberNotification;
use App\Models\Team;
use App\Models\TeamNotification;
use App\Models\TeamUser;

class TeamUserObserver
{
    /**
     * Handle the TeamUser "created" event.
     *
     * @param  \App\Models\TeamUser  $teamUser
     * @return void
     */
    public function created(TeamUser $teamUser)
    {
        NewMemberNotification::dispatch(Team::find($teamUser->team_id), $teamUser->user->name);
    }

    /**
     * Handle the TeamUser "updated" event.
     *
     * @param  \App\Models\TeamUser  $teamUser
     * @return void
     */
    public function updated(TeamUser $teamUser)
    {
        //
    }

    /**
     * Handle the TeamUser "deleted" event.
     *
     * @param  \App\Models\TeamUser  $teamUser
     * @return void
     */
    public function deleted(TeamUser $teamUser)
    {
        //
    }

    /**
     * Handle the TeamUser "restored" event.
     *
     * @param  \App\Models\TeamUser  $teamUser
     * @return void
     */
    public function restored(TeamUser $teamUser)
    {
        //
    }

    /**
     * Handle the TeamUser "force deleted" event.
     *
     * @param  \App\Models\TeamUser  $teamUser
     * @return void
     */
    public function forceDeleted(TeamUser $teamUser)
    {
        //
    }
}
