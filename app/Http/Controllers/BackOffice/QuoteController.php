<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

use App\Http\Requests\QuoteRequest;

use App\Models\Quote;

class QuoteController extends Controller
{
    public function __construct()
    {
        $this->middleware(function (Request $request, $next) {
            if (Auth::user()->can('access-backoffice')
            || Auth::user()->can('access-backoffice.quotes')) {
                return $next($request);
            }
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $quotes = Quote::orderBy('updated_at', 'desc')->get();

        return view('backoffice.quotes.index')->with('quotes', $quotes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $quote = new Quote();
        return view('backoffice.quotes.form', [
            'quote' => $quote,
            'action' => route('backoffice.quote.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(QuoteRequest $request)
    {
        $data = $request->validated();
        $quote = new Quote($data);
        $quote->creator_id = Auth::id();

        if ($quote->save()){
            return $this->index();
        }
        else{
            return $this->create();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Quote $quote
     * @return Response
     */
    public function show(Quote $quote)
    {
        return $this->edit($quote);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Quote $quote
     * @return Response
     */
    public function edit(Quote $quote)
    {
        return view('backoffice.quotes.form',[
                'quote' => $quote,
                'action' => route('backoffice.quote.update', $quote),
                'method' => 'PUT'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuoteRequest $request
     * @param Quote $quote
     * @return Response
     */
    public function update(QuoteRequest $request, Quote $quote)
    {
        $data = $request->validated();
        $quote->update($data);
        $quote->save();

        return $this->edit($quote);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Quote $quote
     * @return Response
     */
    public function destroy(Quote $quote)
    {
        try {
            $quote->delete();
            return $this->index();
        } catch (Exception $e) {
            return back()->with('error', 'Impossible de supprimer la citation');
        }
    }
}
