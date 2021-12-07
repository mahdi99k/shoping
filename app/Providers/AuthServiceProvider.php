<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];


    public function boot()
    {
        $this->registerPolicies();

        //----------------------- Gate

/*      Gate::define('view-dashboard', function (User $user) {   //define 1)do work  2)callback  | User $user laravel auto login
            return $user->role->hasPermission('view-dashboard');
        });

        Gate::define('create-brand', function (User $user) {
            return $user->role->hasPermission('create-brand');
        });

        Gate::define('create-category', function (User $user) {
            return $user->role->hasPermission('create-category');
        });*/

    }
}
