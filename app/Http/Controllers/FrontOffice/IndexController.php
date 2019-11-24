<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests\MessageRequest;

use App\Models\Article;
use App\Models\Message;

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
            ->orderBy('updated_at', 'desc')
            ->paginate(config('paginate.frontoffice.articles.index'));

        return view('frontoffice.index')->with('articles', $articles);
    }

    public function get_contact()
    {
        return view('frontoffice.contact', ['categories_messages' => $this->categories_messages]);
    }

    public function post_contact(MessageRequest $request)
    {
    }

    public function tableRonde()
    {
        return view('frontoffice.table_ronde');
    }
}
