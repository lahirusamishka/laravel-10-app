<?php
// Middleware, který kontroluje, jestli je autentifikovaný uživatel admin (pokud ne, jsou přesměrování zpět)
namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->admin) {
            return redirect()->back();
        }

        return $next($request);
    }
}
