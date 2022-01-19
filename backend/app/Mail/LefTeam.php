<?php

namespace App\Mail;

use App\Models\TeamUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LefTeam extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $teamUser)
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
        return $this
            ->view('emails.team.user-left')
            ->with(['team' => 'adsa', 'user' => 'asdasdsakoda']) //$this->teamUser->user->name
            ->subject(config('app.name').' | '.'You Left The ${} Team');
    }
}
