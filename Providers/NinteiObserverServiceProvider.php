<?php

namespace Modules\Nintei\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Nintei\Models\Auth\User;
use Modules\Nintei\Observers\User\UserObserver;

/**
 * Class NinteiObserverServiceProvider.
 */
class NinteiObserverServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
