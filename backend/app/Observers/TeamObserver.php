<?php

namespace App\Observers;

use App\Models\Role;
use App\Models\Team;
use App\Traits\Image;
use Illuminate\Support\Str;


class TeamObserver
{
    use Image;

    /**
     * @param  Team  $team
     * @throws \Exception
     */
    public function creating(Team $team)
    {
        $team->key = random_int(1000000000, 9999999999);
        $team->join_code = strtoupper(Str::random(5));
        $team->image = $this->createDefaultTeamImage($team->name);
    }

    /**
     * Handle the Team "created" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function created(Team $team)
    {
        $role = Role::query()
            ->where('name', 'lead')
            ->first('id');

        request()->user()->teams()->attach($team->id, ['role_id' => $role?->id ?? 0]);
    }

    /**
     * Handle the Team "updated" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function updated(Team $team)
    {
        //
    }

    /**
     * Handle the Team "deleted" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function deleted(Team $team)
    {
        //
    }

    /**
     * Handle the Team "restored" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function restored(Team $team)
    {
        //
    }

    /**
     * Handle the Team "force deleted" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function forceDeleted(Team $team)
    {
        //
    }
}
