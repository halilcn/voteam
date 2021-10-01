<?php

namespace App\Traits;

use App\Models\User;

trait Token
{
    /**
     * @param  User  $user
     * @return string
     */
    public function createToken(User $user): string
    {
        return $user->createToken('web_app_token')->plainTextToken;
    }
}
