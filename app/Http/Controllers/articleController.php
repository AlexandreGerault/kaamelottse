<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ArticleRequest;

use App\Article;

class articleController extends Controller
{
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        
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
        $data=$request->validated();
        $data = $request->validated();
        if (isset($data["visible"])){
            $data["visible"]=1;
        }
        $article = new Article($data);
        $article->user_creator=Auth::id();
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
                'method' => 'PUT']);
        }
        return "edi: Non trouvé";
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
            $data = $request->validated();
            if (isset($data["visible"])){
                $data["visible"]=1;
            }
            else{
                $data["visible"]=0;                
            }
            $article->update($data);
            $article->save();
            
            return view('gest/article',[
                'article'=>$article,
                'action'=>route('article.update', $id),
                'method' => 'PUT']);
        }
        return "upd: Non trouvé";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->article->find($id)){
            return $this->article->destroy();            
        }
        return "sup: Non trouvé";
    }
}
