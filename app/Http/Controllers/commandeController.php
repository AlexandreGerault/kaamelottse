<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produit;

class commandeController extends Controller
{
    public function index(){
        $produits = Produit::orderBy('updated_at', 'desc')->get();
        
        return view('banquet',['produits'=>$produits, 'modif' => false]);
    }
}
