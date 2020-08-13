<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

use App\Http\Requests\ProductRequest;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:access-backoffice');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('backoffice.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
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
     * @return Application|Factory|Response|View
     */
    public function edit(Product $product)
    {
        try {
            $this->authorize('update', $product);

            return view('backoffice.products.form', [
                'product' => $product,
                'action' => route('backoffice.product.update', $product),
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

    public function resume()
    {
        $outgoing = array();
        Order::where('status', config('ordering.status.IN_DELIVERY'))
            ->orWhere('status', config('ordering.status.PENDING'))
            ->each(function (Order $order) use (&$outgoing) {
                $order->items->each(function (OrderItem $orderItem) use (&$outgoing) {
                    if(isset($outgoing[$orderItem->product->name]))
                        $outgoing[$orderItem->product->name] += $orderItem->quantity;
                    else
                        $outgoing[$orderItem->product->name] = $orderItem->quantity;
                });
            });


        dd($outgoing);
    }
}
