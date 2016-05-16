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
     * @param  $requiredRole
     * @return mixed
     */
    public function handle($request, Closure $next, $requiredRole)
    {
        $user = $request->user();

        if(isset($user) && isset($requiredRole)) {

            switch($requiredRole) {
                case 'admin':
                    if($user->isAdmin()) {
                        return $next($request);
                    }
                    break;
                case 'retailer':
                    if($user->isRetailer()) {
                        return $next($request);
                    }
                    break;
            }

        }

        return redirect()->back();
    }
}
