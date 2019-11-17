<?php

namespace App\Http\Middleware;

use Closure;

use App\Citation;

class getCitation
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
        if (true or !$request->session()->get('citation')){
            $citation = Citation::all()->random(1)->first();
            $request->session()->put('citation', [ 'contenu' => $citation->contenu, 'auteur' => $citation->auteur ]);
        }
        return $next($request);
    }
}
