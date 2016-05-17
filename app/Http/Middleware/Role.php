<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class Role
{
    /**
     * Handle an incoming request and checks if the user has the required role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();

        foreach($roles as $role) {
            if($user->hasRole($role)) {
                return $next($request);
            }
        }

        return redirect()->back();
    }
}
