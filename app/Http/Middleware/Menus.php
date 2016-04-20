<?php

namespace App\Http\Middleware;

use Closure;
use Menu;
use Auth;

class Menus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        Menu::make('menu', function($menu) {
            $menu->add('Home', ['route' => 'index']);

            // Products
            //$menu->add('Producten', ['route' => 'producten']);

            // Profile
            if (Auth::guest()) {
                $menu->add('Inloggen', ['route' => 'inloggen']);
            } else {
                $menu->add('Profiel', 'account');
                $menu->profiel->prepend('<i class="fa fa-user"></i> ');

                $menu->profiel->group(['prefix' => 'account'], function($group) {
                    //$group->add('Wachtwoord wijzigen', ['route' => 'wachtwoord-wijzigen']);
                });

                $menu->profiel->add('Uitloggen', ['route' => 'uitloggen']);
            }
        });

        return $next($request);
    }
}