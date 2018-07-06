<?php

namespace Modules\Nintei\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Modules\Nintei\Models\Auth\User;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The root namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $rootUrlNamespace = 'Modules\Nintei\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Register route model bindings
         */

        /*
         * Allow this to select all users regardless of status
         */
        $this->bind('user', function ($value) {
            $user = new User;

            return User::withTrashed()->where($user->getRouteKeyName(), $value)->first();
        });

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Router $router)
    {
        // if (!app()->routesAreCached()) {
        //    require __DIR__ . '/Http/routes.php';
        // }
    }
}
