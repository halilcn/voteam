<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamUserInvitationPolicy
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
    public function create(User $user, Team $team): bool
    {
        return $team->hasUserAndRole($user->id, Role::$ROLES['LEAD']);
    }
}
