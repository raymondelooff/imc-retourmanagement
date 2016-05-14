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

            // Check if the user is authenticated
            if(Auth::check()) {
                // Products
                $menu->add('Producten', ['route' => 'product.index']);
                $menu->producten->prepend('<i class="fa fa-cubes" aria-hidden="true"></i> ');
                $menu->producten->add('Voeg een product toe', ['route' => 'product.create']);

                $menu->add('Gebruikers', ['route' => 'user.index']);
                $menu->gebruikers->prepend('<i class="fa fa-users" aria-hidden="true"></i> ');
                $menu->gebruikers->add('Voeg een gebruiker toe', ['route' => 'user.create']);
            }
        });

        return $next($request);
    }
}