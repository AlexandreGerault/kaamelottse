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
        if(User::noPendingOrder()->get())
        return view('gest.orders.create');
    }

    public function show(Order $order)
    {
        return view('gest.orders.show')->with('order', $order);
    }

    public function store(OrderRequest $request)
    {
        dd($request);
    }

    public function usernameAutocomplete(Request $request)
    {
        $users = User::noPendingOrder()->where('name', 'LIKE', '%'. $request->get('name') . '%')->select('name')->get();

        return response()->json($users, 200);
    }
}
