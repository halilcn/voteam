<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\Vote;
use App\Models\VotedUser;
use App\Policies\TeamPolicy;
use App\Policies\VotedUserPolicy;
use App\Policies\VotePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Vote::class => VotePolicy::class,
        VotedUser::class => VotedUserPolicy::class,
        Team::class => TeamPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //
    }
}
