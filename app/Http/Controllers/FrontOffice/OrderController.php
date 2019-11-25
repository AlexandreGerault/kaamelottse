<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Auth::user()->orders;
        return view('frontoffice.orders.index')->with('orders', $orders);
    }

    public function create()
    {
        try {
            $this->authorize('create', Order::class);

            return view('frontoffice.orders.create')
                ->with('action', route('order.store'))
                ->with('products', Product::available()->orderBy('priority', 'desc')->get());
        } catch (AuthorizationException $e) {
            return back()->with('error', 'Vous n\'avez pas le droit de créer une commande');
        }
    }

    public function edit(Order $order)
    {
        abort(403);
    }

    public function show(Order $order)
    {
        try {
            $this->authorize('view', $order);
            return view('frontoffice.orders.show')->with('order', $order);
        } catch (AuthorizationException $e) {
            return back()->with('error', 'Vous n\'avez pas le droit d\'accéder à cette commande');
        }
    }

    public function store(StoreOrderRequest $request)
    {
        /*
         * Create order
         */
        $order = new Order($request->only(['status', 'shipping_address', 'phone']));
        $order->customer()->associate(Auth::user());
        $order->save();

        /*
         * Add orderItems to order
         */
        foreach ($request->products() as $product) {
            $orderItem = new OrderItem(['quantity' => $request->get($product->id)]);
            $orderItem->product()->associate($product);
            $orderItem->order()->associate($order);
            $orderItem->save();
        }

        // TODO : Update total price
        $order->selfUpdateTotals();

        return redirect()->route('order.show', $order);
    }

    public function update(Request $request, Order $order)
    {
        $rules = [];

        if ($order->phone === null)
            $rules['phone'] = 'required|string';
        if ($order->shipping_address === null)
            $rules['shipping_address'] = 'required|string';

        \Validator::make($request->all(), $rules);

        foreach ($request->except('_token', '_method') as $key => $value) {
            $order->$key = $value;
        }
        $order->status = config('ordering.status.PENDING');
        $order->save();

        return $this->show($order)->with('error', 'Commande terminée avec succès');
    }

    public function destroy(Order $order)
    {
        try {
            $this->authorize('delete', $order);
        } catch (AuthorizationException $e) {
            return back()->with('error', 'Vous ne pouvez pas supprimer la commande');
        }

        Order::destroy($order->id);

        return $this->index()->with('success', 'Commande supprimée avec succès');
    }
}
