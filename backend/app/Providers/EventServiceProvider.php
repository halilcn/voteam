<?php

namespace App\Providers;

use App\Models\CalculatedVote;
use App\Models\ForgotPassword;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\TeamUserInvitation;
use App\Models\User;
use App\Models\UserRegisterCode;
use App\Models\Vote;
use App\Models\VotedUser;
use App\Observers\CalculatedVoteObserver;
use App\Observers\ForgotPasswordObserver;
use App\Observers\TeamObserver;
use App\Observers\TeamUserInvitationObserver;
use App\Observers\TeamUserObserver;
use App\Observers\UserObserver;
use App\Observers\UserRegisterCodeObserver;
use App\Observers\VotedUserObserver;
use App\Observers\VoteObserver;
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
        Vote::observe(VoteObserver::class);
        VotedUser::observe(VotedUserObserver::class);
        TeamUserInvitation::observe(TeamUserInvitationObserver::class);
        TeamUser::observe(TeamUserObserver::class);
        ForgotPassword::observe(ForgotPasswordObserver::class);
        CalculatedVote::observe(CalculatedVoteObserver::class);
    }
}
