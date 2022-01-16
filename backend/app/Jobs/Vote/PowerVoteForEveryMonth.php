<?php

namespace App\Jobs\Vote;

use App\Models\Team;
use App\Models\Vote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PowerVoteForEveryMonth implements ShouldQueue
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
        if (!$this->team->hasPowerTypeVoteThisMonth()) {
            return;
        }

        $this->team->votes()->create([
                                         'title' => 'kasımın güç oylaması',
                                         'type' => Vote::$TYPES['POWER'],
                                         'options' => [
                                             "type" => "text",
                                             "message" => "Power Vote"
                                         ],
                                         'start_date' => now(),
                                         'end_date' => now()->addDays(2)
                                     ]);
    }
}
