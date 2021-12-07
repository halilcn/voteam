<?php

namespace App\Jobs;

use App\Models\TeamUserInvitation;
use App\Mail\TeamUserInvitation as TeamUserInvitationEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendTeamUserInvitationEmail
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var int
     */
    public int $tries = 5;

    /**
     * @var int
     */
    public int $timeout = 100;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected TeamUserInvitation $teamUserInvitation)
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
        Mail::to($this->teamUserInvitation->email)->send(new TeamUserInvitationEmail($this->teamUserInvitation));
    }
}
