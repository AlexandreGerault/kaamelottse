<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;

use App\Models\Article;

class IndexController extends Controller
{
    
    public function index()
    {
        $articles = Article::paginate(config('paginate.backoffice.articles.index'));

        return view('index')->with('articles', $articles);
    }

}
