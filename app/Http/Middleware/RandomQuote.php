<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\Quote;
use Illuminate\Http\Request;

class RandomQuote
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $quote = Quote::all()->random();
        session()->flash('quote', [
            'content' => $quote->content,
            'author' => $quote->author
        ]);
        return $next($request);
    }
}
