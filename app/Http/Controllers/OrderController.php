<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['customer', 'deliveryDriver'])
            ->orderBy('updated_at', 'desc')
            ->paginate(5);

        return view('gest.orders.index')
            ->with('orders', $orders);
    }

    public function create()
    {
        return view('gest.orders.create');
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

    public function usernameAutocomplete(Request $request)
    {
        $users = User::noPendingOrder()->get();

        return response()->json($users, 200);
    }
}
