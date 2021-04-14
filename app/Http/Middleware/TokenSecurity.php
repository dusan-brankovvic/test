<?php

namespace App\Http\Middleware;

use Closure;

class TokenSecurity
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
        if ((int)$request->header('token') !== (int)env('TOKEN')) {
            abort(401);
        }

        return $next($request);
    }
}
