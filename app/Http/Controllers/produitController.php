<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ProduitRequest;

use App\Produit;

class produitController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = produit::orderBy('updated_at', 'desc')->get();
        
        return view('banquet',['produits'=>$produits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produit = new produit();
        return view('banquet',[
            'produit'=>$produit,
            'action'=>route('produit.store')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitRequest $request)  //La validation est déléguée à produitRequest
    {
        $data = $request->validated();
        $produit = new produit($data);
        
        if ($produit->save()){
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
        if($produit = produit::find($id)){
            
            return view('gest/produit',[
                'produit'=>$produit,
                'action'=>route('produit.update', $id),
                'method' => 'PUT',
                'id' => $id]);
        }
        return redirect()->back()->with('error', ['produit non trouvé']);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitRequest $request, $id)
    {
        if ($produit = produit::find($id)){
            $produit->update($request->validated());
            if( $produit->save()){
                echo "ça marche !";
            }
            else{
                echo "et non :( )";
            }
            
            return view('gest/produit',[
                'produit'=>$produit,
                'action'=>route('produit.update', $id),
                'method' => 'PUT',
                'id' => $id]);
        }
        return;
        //return redirect()->back()->with('error', ['produit non trouvé']);
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
        
        if ($produit = produit::find($id)){
            if($produit->delete()){
                return redirect()->route('produit.index')->with('success', ['produit supprimé']);  
            }
            return redirect()->back()->with('error', ['Erreur de suppression']);  
        }
        return redirect()->back()->with('error', ['produit non trouvé']);  
    }
}
