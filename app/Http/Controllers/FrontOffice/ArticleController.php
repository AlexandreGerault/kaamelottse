<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Article;

use App\Http\Requests\ArticleRequest;
use Exception;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::published()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('paginate.frontoffice.articles.index'));

        return view('frontoffice.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request)  //La validation est dÃ©lÃ©guÃ©e Ã  articleRequest
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleRequest $request
     * @param Article $article
     * @return Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return Response
     * @throws Exception
     */
    public function destroy(Article $article)
    {
        return abort(404);
    }
}
