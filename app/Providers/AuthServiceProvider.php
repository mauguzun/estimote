<?php

namespace App\Providers;

use App\Entity\User;
use App\Policies\RoutePolicy;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Route::class => RoutePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();
        $this->registerPermissions($gate);
    }

    public function registerPermissions(GateContract $gate)
    {
        $gate->define('access-content', function(User $user, string $permission) {
            if ($user->isAdmin()) {
                return true;
            }

            return in_array($permission, $user->getRole()->permissionsToArray());
        });
    }
}
