<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    
    public function index(){
        return view('index');
    }
    
    public function contact(){
        return view('contact');
    }
    
    public function tableRonde(){
        return view('table_ronde');
    }
}
