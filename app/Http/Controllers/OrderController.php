<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('updated_at', 'desc')->with('customer')->with('items')->paginate(5);
        
        return view('gest.orders.index')
            ->with('orders', $orders);
    }

    public function create()
    {
        $products = Product::orderBy('updated_at', 'desc')->get();

        return view('banquet')->with('products', $products);
    }

    public function show(Order $order)
    {
        return view('gest.orders.show')->with('order', $order);
    }

    public function store(OrderRequest $request)
    {
        $order = new Order();
        foreach ($request->except('_token') as $id => $quantity)
        {
            $product = Product::find($id);
            echo '<b>' . $product->name . ' :</b> ' . $quantity . '</br>';
        }
        dd($request->all());
    }
}