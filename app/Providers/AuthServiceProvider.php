<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract ;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Role;
use App\User;
use App\Permission;
use App\Providers\AuthServiceProvider as Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();
   
     
    $gate->define('store', function (User $user, Role $role) {
            return $user->id == $role_user->user_id;
        });
      

    }}

