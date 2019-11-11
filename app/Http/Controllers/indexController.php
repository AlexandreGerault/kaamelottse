<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class indexController extends Controller
{
    
    public function index(){
        $articles = Article::where('visible', 1)
               ->orderBy('priorite', 'desc')
               ->get();
        return view('index', ['articles' => $articles]);
    }
    
    public function contact(){
        return view('contact');
    }
    
    public function tableRonde(){
        return view('table_ronde');
    }
}
