<?php

namespace App\Jobs;

use App\Mail\VoteCreated;
use App\Models\Vote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendVoteCreatedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Vote $vote)
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
        $emails = $this->vote->team->users()->pluck('email');
        $emailData = [
            'teamName' => $this->vote->team->name,
            'voteTitle' => $this->vote->title,
            'voteType' => $this->vote->type,
            'teamLink' => config('app.frontend_url').'/teams/'.$this->vote->team->key.'/home',
        ];

        foreach ($emails as $email) {
            Mail::to($email)->send(new VoteCreated($emailData));
        }
    }
}
