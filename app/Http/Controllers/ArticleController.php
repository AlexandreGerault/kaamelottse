<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('updated_at', 'desc')->get();

        return view('gest.articles')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gest.article')
            ->with('article', new Article)
            ->with('action', route('article.store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return $this->edit($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('gest.article')
            ->with('article', $article)
            ->with('action', route('article.update', ['article' => $article]))
            ->with('method', 'PUT');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleRequest $request
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        if ($article) {
            $data = $request->validated();
            $data['published'] = isset($data['published']);
            $article->update($data);
            $article->save();

            return view('gest.article')
                ->with('article', $article)
                ->with('action', route('article.update', $article))
                ->with('method', 'PUT');
        }

        return redirect()->back()->with('error', 'Article non trouvÃ©');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $user = Auth::user();
        if (! $user->hasPermission('article.destroy')) {
            abort(404);
        }

        if ($article) {
            if($article->delete()) {
                return redirect()->route('article.index')->with('success', ['Article supprimÃ©']);
            }
            return redirect()->back()->with('error', ['Erreur de suppression']);
        }
        return redirect()->back()->with('error', ['Article non trouvÃ©']);
    }
}
