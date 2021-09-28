<?php

namespace App\Observers;

use App\Jobs\SendRegisterCode;
use App\Models\UserRegisterCode;
use Illuminate\Support\Str;

class UserRegisterCodeObserver
{

    /**
     * @param  UserRegisterCode  $userRegisterCode
     * @return void
     */
    public function creating(UserRegisterCode $userRegisterCode)
    {
        $userRegisterCode->key = Str::random();
        $userRegisterCode->code = rand(1000, 9999);
    }

    /**
     * Handle the UserRegisterCode "created" event.
     *
     * @param  \App\Models\UserRegisterCode  $userRegisterCode
     * @return void
     */
    public function created(UserRegisterCode $userRegisterCode)
    {
        SendRegisterCode::dispatch($userRegisterCode);
    }


    /**
     * Handle the UserRegisterCode "updated" event.
     *
     * @param  \App\Models\UserRegisterCode  $userRegisterCode
     * @return void
     */
    public function updated(UserRegisterCode $userRegisterCode)
    {
        //
    }

    /**
     * Handle the UserRegisterCode "deleted" event.
     *
     * @param  \App\Models\UserRegisterCode  $userRegisterCode
     * @return void
     */
    public function deleted(UserRegisterCode $userRegisterCode)
    {
        //
    }

    /**
     * Handle the UserRegisterCode "restored" event.
     *
     * @param  \App\Models\UserRegisterCode  $userRegisterCode
     * @return void
     */
    public function restored(UserRegisterCode $userRegisterCode)
    {
        //
    }

    /**
     * Handle the UserRegisterCode "force deleted" event.
     *
     * @param  \App\Models\UserRegisterCode  $userRegisterCode
     * @return void
     */
    public function forceDeleted(UserRegisterCode $userRegisterCode)
    {
        //
    }
}
