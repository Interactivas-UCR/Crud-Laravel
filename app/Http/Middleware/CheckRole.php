<?php

namespace TRAINERPOKEMON\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $redirect)
    {

        if (!$request->user()->hasRole($role)) {
            return redirect($redirect);
        }

        return $next($request);
    }
}
