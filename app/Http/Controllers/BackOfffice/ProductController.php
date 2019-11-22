<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Product;

use App\Http\Requests\ProductRequest;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::orderBy('desc')->paginate(10);
        
        return view('backoffice.products.index')->with('products', $products);
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

        return view('backoffice.products.form', [
            'product' => new Product(),
            'action' => route('backoffice.product.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $this->authorize('create', Product::class);

            $data = $request->validated();
            $data['available'] = isset($data['available']);

            $product = new Product($data);
            $product->save();

            return $this->index();
        } catch (AuthorizationException $e) {
            //TODO : Handle the authorization exception
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
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
     */
    public function edit(Product $product)
    {
        try {
            $this->authorize('update', $product);

            return view('backoffice.products.form', [
                'product' => $product,
                'action' => route('backoffice.products.form', $product),
                'method' => 'PUT'
            ]);
        } catch (AuthorizationException $e) {
            //TODO : Handle the authorization exception
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        try {
            $this->authorize('update', $product);

            $data = $request->validated();
            $data['available'] = isset($data['available']);
            $product->update($data);
            $product->save();

            return $this->edit($product);
        } catch (AuthorizationException $e) {
            //TODO : Handle the authorization exception
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     * @throws Exception
     */
    public function destroy(Product $product)
    {
        try {
            $this->authorize('delete', $product);
            $product->delete();
        } catch (AuthorizationException $e) {
            //TODO : Handle the authorization exception
        } catch (Exception $e) {
            //TODO : Handle the delete exception
        }
        return $this->index();
    }
}
