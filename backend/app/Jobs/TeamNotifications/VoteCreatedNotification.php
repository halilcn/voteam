<?php

namespace App\Jobs\TeamNotifications;

use App\Models\Team;
use App\Models\TeamNotification;
use App\Models\User;
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
    public function __construct(public Team $team, public string $voteTitle)
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
        $data = collect([
                            User::$LANGUAGES['TR'] => [
                                'message' => $this->voteTitle.' isimli bir oylama başlatıldı !',
                            ],
                            User::$LANGUAGES['EN'] => [
                                'message' => $this->voteTitle.' voting started !',
                            ]
                        ]);

        $this
            ->team
            ->notifications()
            ->create(
                [
                    'type' => 'VoteCreated',
                    'data' => $data->map(function ($item) {
                        $item['action'] = Team::$NOTIFICATION_ACTIONS['INFORMATION'];
                        return $item;
                    })
                ]
            );
    }
}
