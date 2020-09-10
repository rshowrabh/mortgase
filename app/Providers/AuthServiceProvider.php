<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {

            return $user->roles->first()->id == 1;
        });
        Gate::define('isAgent', function ($user) {
            return $user->roles->first()->id == 2;
        });
        Gate::define('isClient', function ($user) {
            return $user->roles->first()->id == 3;
        });
        Gate::define('isBroker', function ($user) {
            return $user->roles->first()->id == 4;
        });


        // Passport::routes();
        //
    }
}
