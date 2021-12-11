<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamUserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param  User  $user
     * @param  Team  $team
     * @return bool
     */
    public function view(User $user, Team $team): bool
    {
        return $team->hasUser($user->id);
    }

    /**
     * @param  User  $user
     * @param  Team  $team
     * @return bool
     */
    public function delete(User $user, Team $team): bool
    {
        return $team->hasUserAndRole($user->id, Role::$ROLES['LEAD']);
    }
}
