<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  array ...$guards
     *
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {

        $guest = true;

        foreach ($guards as $guardElem) {
            if (!\Auth::guard($guardElem)->guest()) {
                \Auth::setDefaultDriver($guardElem);
                $guest = false;
                break;
            }
        }

        if ($guest) {
            if (in_array('admin', $guards)) {
                return \Redirect::guest('/admin/login');
            }

            return \Redirect::guest('/');
        }

        abort_if(
            \Auth::guard('admin')->user() &&  \Gate::denies('access', \Route::getCurrentRoute()),
            403,
            'Access denied! '
        );

        return $next($request);
    }
}
