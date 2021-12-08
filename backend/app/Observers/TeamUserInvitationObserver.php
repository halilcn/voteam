<?php

namespace App\Observers;

use App\Jobs\SendTeamUserInvitationEmail;
use App\Models\TeamUserInvitation;
use App\Models\User;
use App\Notifications\TeamUserInvitationNotification;
use Illuminate\Support\Str;

class TeamUserInvitationObserver
{
    /**
     * @param  TeamUserInvitation  $teamUserInvitation
     */
    public function creating(TeamUserInvitation $teamUserInvitation)
    {
        $teamUserInvitation->random_key = Str::random();
    }

    /**
     * Handle the TeamUserInvitation "created" event.
     *
     * @param  \App\Models\TeamUserInvitation  $teamUserInvitation
     * @return void
     */
    public function created(TeamUserInvitation $teamUserInvitation)
    {
        $user = User::where('email', $teamUserInvitation->email)->first();
        $user?->notify(new TeamUserInvitationNotification($teamUserInvitation->team->name));

        SendTeamUserInvitationEmail::dispatch($teamUserInvitation);
    }

    /**
     * Handle the TeamUserInvitation "updated" event.
     *
     * @param  \App\Models\TeamUserInvitation  $teamUserInvitation
     * @return void
     */
    public function updated(TeamUserInvitation $teamUserInvitation)
    {
        //
    }

    /**
     * Handle the TeamUserInvitation "deleted" event.
     *
     * @param  \App\Models\TeamUserInvitation  $teamUserInvitation
     * @return void
     */
    public function deleted(TeamUserInvitation $teamUserInvitation)
    {
        //
    }

    /**
     * Handle the TeamUserInvitation "restored" event.
     *
     * @param  \App\Models\TeamUserInvitation  $teamUserInvitation
     * @return void
     */
    public function restored(TeamUserInvitation $teamUserInvitation)
    {
        //
    }

    /**
     * Handle the TeamUserInvitation "force deleted" event.
     *
     * @param  \App\Models\TeamUserInvitation  $teamUserInvitation
     * @return void
     */
    public function forceDeleted(TeamUserInvitation $teamUserInvitation)
    {
        //
    }
}
