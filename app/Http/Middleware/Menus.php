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
            $menu->add('Producten', ['route' => 'product.index']);
            $menu->producten->prepend('<i class="fa fa-cubes" aria-hidden="true"></i> ');
            $menu->producten->add('Voeg een product toe', ['route' => 'product.create']);
        });

        return $next($request);
    }
}