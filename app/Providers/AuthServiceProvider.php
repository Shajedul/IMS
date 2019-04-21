<?php

namespace App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Customer' => 'App\Policies\CustomerPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define( 'authorizedUser',function ($user){
            if($user->getGuard()=='web')
            {
                return true;
            }
            return false;
        });

        Gate::define( 'authorizedAdmin',function ($user){
            if($user->getGuard()=='admin')
            {
                return true;
            }
            return false;

        });
    }
}
