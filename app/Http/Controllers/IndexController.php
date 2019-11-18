<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests\MessageRequest;

use App\Models\Article;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public $categories_messages = [
        1 => "Une demande d'information sur un évènement",
        2 => "Une demande concernant une commande / un service",
        3 => "Les paroles de Martins Marteau",
        4 => "Un problème technique avec le site",
        5 => "Une demande de confidencialité"
    ];
    
    public function index()
    {
        $articles = Article::published()
            ->orderBy('priority', 'desc')
            ->get();

        return view('index')->with('articles', $articles);
    }
    
    public function get_contact(){
        return view('contact', ['categories_messages' => $this->categories_messages]);
    }
    
    public function post_contact(MessageRequest $request){
        $message = new Message($request->validated());
        $message->sender_ip = $request->ip();
        
        if ($message->save()){
            return redirect('/')->with('sucess', 'Votre message a bien été enregistré, nous allons vous recontacter au plus vite');
        }
        else{
            return back()->with('error', 'Erreur d\'enregistrement, veuillez réessayer plus tard :(')->withInput();
        }
        return view('contact');
    }
    
    public function tableRonde(){
        return view('table_ronde');
    }
}
