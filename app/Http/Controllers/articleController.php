<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ArticleRequest;

use App\Article;

class articleController extends Controller
{
    //Accès réservé aux seuls éditeurs
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
        
        return view('gest/articles',['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new Article();
        return view('gest/article',[
            'article'=>$article,
            'action'=>route('article.store')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)  //La validation est déléguée à articleRequest
    {
        $article = new Article($request->validated());
        $article->user_creator=Auth::id();
        $article->visible=(int) isset($data["visible"]);
        
        if ($article->save()){
            return $this->index();
        }
        else{
            return $this->create();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($article = Article::find($id)){
            
            return view('gest/article',[
                'article'=>$article,
                'action'=>route('article.update', $id),
                'method' => 'PUT',
                'id' => $id]);
        }
        return redirect()->back()->with('error', ['Article non trouvé']);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        if ($article = Article::find($id)){
            $article->update($request->validated());
            $article->visible = (int) isset($data["visible"]);
            $article->save();
            
            return view('gest/article',[
                'article'=>$article,
                'action'=>route('article.update', $id),
                'method' => 'PUT',
                'id' => $id]);
        }
        return redirect()->back()->with('error', ['Article non trouvé']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Supperssion réservée aux membres autorisés
        $user = Auth::user();
        if ($user["role"]<3){
            abort(404);
        }
        
        if ($article = Article::find($id)){
            if($article->delete()){
                return redirect()->route('article.index')->with('success', ['Article supprimé']);  
            }
            return redirect()->back()->with('error', ['Erreur de suppression']);  
        }
        return redirect()->back()->with('error', ['Article non trouvé']);  
    }
}
