<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\Citation;
use Illuminate\Support\Facades\Log;

class GetCitation
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
        if (!$request->session()->get('citation') && Citation::all()->count() > 0) {	//Pour forcer la citation à changer à chaque fois
            $citation = Citation::all()->random()->first();
            $request->session()->put('citation', [ 'content' => $citation->content, 'author' => $citation->author ]);
        }
        return $next($request);
    }
}
