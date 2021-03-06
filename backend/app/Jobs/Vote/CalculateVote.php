<?php

namespace App\Jobs\Vote;

use App\Models\Vote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CalculateVote implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Vote $vote, public $delay = 0)
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
        if ($this->vote->type === Vote::$TYPES['POWER']) {
            PowerVoteCalculate::dispatch($this->vote)->delay($this->delay);
        }

        if ($this->vote->type === Vote::$TYPES['DOUBLE']) {
            DoubleVoteCalculate::dispatch($this->vote)->delay($this->delay);
        }

        if ($this->vote->type === Vote::$TYPES['MULTIPLE']) {
            MultipleVoteCalculate::dispatch($this->vote)->delay($this->delay);
        }
    }
}
