<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\TeamUserInvitation as TeamUserInvitationModel;

class TeamUserInvitation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(protected TeamUserInvitationModel $teamUserInvitation)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $INVITATION_URL = 'team-join/user-invitation/'.$this->teamUserInvitation->random_key;

        return $this
            ->view('emails.team.user-invitation')
            ->with([
                       'name' => $this->teamUserInvitation->name,
                       'team_name' => $this->teamUserInvitation->team->name ?? 'user',
                       'invitation_url' => config('app.frontend_url').$INVITATION_URL
                   ])
            ->subject(config('app.name').' | '.'Team User Invitation');
    }
}
