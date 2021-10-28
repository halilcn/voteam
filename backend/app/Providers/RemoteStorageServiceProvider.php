<?php

namespace App\Providers;

use App\Services\RemoteStorage;
use Illuminate\Support\ServiceProvider;

class RemoteStorageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RemoteStorage::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
