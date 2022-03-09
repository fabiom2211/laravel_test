<?php

namespace App\Http\Middleware;

use Closure;

class Autenticador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->is('entrar', 'registrar')) {
            return redirect('/entrar');
        }

        return $next($request);
    }
}
