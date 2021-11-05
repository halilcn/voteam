<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Auth\Access\HandlesAuthorization;

class VotePolicy
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
    public function show(User $user, Team $team): bool
    {
        return $team->users()->where('user_id', $user->id)->exists();
    }

    /**
     * @param  User  $user
     * @param  Team  $team
     * @return bool
     */
    public function create(User $user, Team $team): bool
    {
        return $team->users()->where('user_id', $user->id)->exists();
    }


}
