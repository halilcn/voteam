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
        /*  $default = [
              'action' => 'test'
          ];

          $data = [
              'tr' => [
                  array_merge([
                                  'message' => $this->voteTitle.' isimli bir oylama başlatıldı !',
                              ], $default)
              ],
              'en' => [
                  array_merge([
                                  'message' => 'en test',
                              ], $default)
              ]
          ];
  */
        $data = collect([
                            'tr' => [
                                'message' => $this->voteTitle.' isimli bir oylama başlatıldı !',
                            ],
                            'en' => [
                                'message' => 'en test',
                            ]
                        ]);


        $data->map(function ($t) {
            $t->action = 'test';
            return $t;
        });


        $this
            ->team
            ->notifications()
            ->create(
                [
                    'type' => 'VoteCreated',
                    'data' => $data
                ]
            );
    }
}
