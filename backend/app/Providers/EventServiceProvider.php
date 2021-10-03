<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use App\Models\UserRegisterCode;
use App\Observers\TeamObserver;
use App\Observers\UserObserver;
use App\Observers\UserRegisterCodeObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        UserRegisterCode::observe(UserRegisterCodeObserver::class);
        User::observe(UserObserver::class);
        Team::observe(TeamObserver::class);
    }
}
