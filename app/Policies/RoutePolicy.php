<?php

namespace App\Policies;

use App\Entity\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Routing\Route;

class RoutePolicy
{
    use HandlesAuthorization;

    /**
     * @var array
     */
    protected static $availablePermissions;

    public static function getAvailablePermissions()
    {
        if (static::$availablePermissions === null) {
            $permissions = [];

            foreach (\Route::getRoutes() as $route) {
                if ($routePermissions = static::getRoutePermissions($route)) {
                    foreach ($routePermissions as $permission) {
                        if (!isset($permissions[$permission])) {
                            $permissions[$permission] = $permission;
                        }
                    }
                }
            }

            static::$availablePermissions = $permissions;
        }

        return static::$availablePermissions;
    }

    /**
     * @param Route $route
     *
     * @return array|bool
     */
    public static function getRoutePermissions(Route $route)
    {
        if (isset($route->getAction()['permissions']) && is_array($route->getAction()['permissions'])) {
            $permissions = [];

            foreach ($route->getAction()['permissions'] as $permission) {
                $permissions[] = $permission;
            }

            return $permissions;
        }

        return false;
    }

    /**
     * Check if user can access the route.
     * @param User $user
     * @param Route $route
     *
     * @return bool
     */
    public function access(User $user, Route $route)
    {
        if ($user->isAdmin()) {
            return true;
        }

        if (is_array($permissions = $this->getRoutePermissions($route))) {
            $userRolePermissions = $user->getRole()->permissionsToArray();

            if (!empty(array_intersect($permissions, $userRolePermissions))) {
                return true;
            }

            return false;
        }

        return true;
    }
}
