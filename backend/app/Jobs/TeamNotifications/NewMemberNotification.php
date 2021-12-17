<?php

namespace App\Jobs\TeamNotifications;

use App\Models\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewMemberNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Team $team, public string $userName)
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
                    'type' => 'NewMember',
                    'data' => [
                        'action' => 'test',
                        'message' => $this->userName.' adlı kullanıcı takıma katıldı !'
                    ]
                ]
            );
    }
}
