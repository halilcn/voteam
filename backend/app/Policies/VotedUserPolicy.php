<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;
use App\Models\Vote;
use App\Models\VotedUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class VotedUserPolicy
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
    public function create(User $user, Vote $vote): bool
    {
        return $vote->team->hasUser($user->id);
    }

}
