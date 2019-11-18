<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')->get();
        
        return view('banquet', ['products' => $products, 'modif' => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('gest/product',[
            'product' => $product,
            'action' => route('product.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)  //La validation est déléguée à ProductRequest
    {
        $data = $request->validated();
        $data['avalaible'] = (int) isset($data['avalaible']);
        $product = new Product($data);
        
        if ($product->save()){
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
        if($product = Product::find($id)){
            return view('gest/product',[
                'product' => $product,
                'action' => route('product.update', $id),
                'method' => 'PUT',
                'id' => $id
            ]);
        }
        return redirect()->back()->with('error', 'produit non trouvé');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        if ($product = Product::find($id)){
            $data = $request->validated();
            $data['disponible'] = (int) isset($data['disponible']);
            $product->update($data);
            
            if( $product->save()){
                return view('gest/product',[
                    'product'=>$product,
                    'action'=>route('product.update', $id),
                    'method' => 'PUT',
                    'id' => $id
                ])->with('sucess', 'Modification enregistrée');
            }
            else {
                echo "et non :( )";
            }
        }
        return redirect()->back()->with('error', 'Echec d\'enregistrement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('destroy', $product);
        
        if ($product){
            if($product->delete()){
                return redirect()->route('product.index')->with('success', ['produit supprimé']);
            }
            return redirect()->back()->with('error', ['Erreur de suppression']);  
        }
    }
}
