<?php

namespace App\Jobs;

use App\Exceptions\Exception;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class JoinTeam
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public object $team)
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
        if (!$this->team) {
            return Exception::joinTeamException();
        }

        $role = Role::query()
            ->where('name', Role::$ROLES['MEMBER'])
            ->first('id');

        request()->user()->teams()->attach($this->team->id, ['role_id' => $role->id ?? 0]);
    }
}
