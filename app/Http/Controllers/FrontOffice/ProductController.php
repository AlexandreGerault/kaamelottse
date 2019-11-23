<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::orderBy('available', 'desc')->get();

        if(Auth::check() && Auth::user()->can('create', Order::class))
            return redirect()->route('order.create');
        else
            return view('frontoffice.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Product::class);

        $product = new Product();
        return view('gest.product', [
            'product' => $product,
            'action' => route('product.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws AuthorizationException
     */
    public function store(ProductRequest $request)
    {
        $this->authorize('create', Product::class);

        $data = $request->validated();
        $data['available'] = isset($data['available']);

        $product = new Product($data);
        $product->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     * @throws AuthorizationException
     */
    public function show(Product $product)
    {
        return $this->edit($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);

        return view('gest.product', [
            'product' => $product,
            'action' => route('product.update', $product),
            'method' => 'PUT'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return Response
     * @throws AuthorizationException
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->authorize('update', $product);

        $data = $request->validated();
        $data['available'] = isset($data['available']);
        $product->update($data);

        if($product->save()) {
            return view('gest.product', [
                'product' => $product,
                'action' => route('product.update', $product),
                'method' => 'PUT'
            ])->with('sucess', 'Modification enregistrée');
        }

        return redirect()->back()->with('error', 'Echec d\'enregistrement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     * @throws AuthorizationException
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();
        return redirect()->route('product.index')->with('success', ['produit supprimé']);
    }
}
