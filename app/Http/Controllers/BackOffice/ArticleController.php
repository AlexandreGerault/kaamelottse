<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\ArticleRequest;
use Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->can('access-backoffice')
                || Auth::user()->can('access-backoffice.articles')) {
                return $next($request);
            }
            abort(403);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::orderBy('updated_at', 'desc')->get();

        return view('backoffice.articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backoffice.articles.form')
            ->with('article', new Article)
            ->with('action', route('backoffice.article.store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request)  //La validation est dÃ©lÃ©guÃ©e Ã  articleRequest
    {
        $data = $request->validated();
        $data['published'] = isset($data['published']);

        $article = new Article($data);
        $article->user()->associate(auth()->user());

        if ($article->save()){
            return $this->index();
        }
        else {
            return $this->create();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        return $this->edit($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        return view('backoffice.articles.form')
            ->with('article', $article)
            ->with('action', route('backoffice.article.update', ['article' => $article]))
            ->with('method', 'PUT');
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
        if ($article) {
            $data = $request->validated();
            $data['published'] = isset($data['published']);
            $article->update($data);
            $article->save();

            return view('backoffice.articles.form')
                ->with('article', $article)
                ->with('action', route('backoffice.article.update', $article))
                ->with('error', 'Article bien édité')
                ->with('method', 'PUT');
        }

        return redirect()->back()->with('error', 'Article non trouvé');
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
        try {
            $this->authorize('article.delete', $article);
            if($article->delete()) {
                return redirect()->route('backoffice.article.index')->with('success', ['Article supprimé']);
            }
            return redirect()->back()->with('error', ['Erreur de suppression']);
        } catch (AuthorizationException $e) {
            return redirect()->back()->with('error', ['Article non trouvé']); // Ou action non autorisée, au choix
        }

    }
}
