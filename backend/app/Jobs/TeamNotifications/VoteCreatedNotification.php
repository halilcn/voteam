<?php

namespace App\Jobs\TeamNotifications;

use App\Models\Team;
use App\Models\TeamNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class VoteCreatedNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Team $team)
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
        $this
            ->team
            ->notifications()
            ->create(
                [
                    'type' => 'VoteCreated',
                    'data' => [
                        'message' => 'Oylama oluşturuldu !'
                    ]
                ]
            );
    }
}
