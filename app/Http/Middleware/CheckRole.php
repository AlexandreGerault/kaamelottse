<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

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
    public function handle($request, Closure $next, $role)
    {
        if (true){
            return $next($request);
        }
        return abort(404);
    }
}
