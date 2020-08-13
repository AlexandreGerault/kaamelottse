<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\MessageDelivery;
use App\User;

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

        $order->selfUpdateTotals();

        return redirect()->route('order.show', $order);
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());
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

    /*
     *  Pour envoyer un message associé à la livraison (demande précision, pb ou autre)
     */
    public function sendMessage(Request $request, Order $order)
    {
        if (Auth::user()->id != $order->customer_id){
            return redirect()->back()->with('error', 'Commande non reconnue');
        }
        try {
            $messageDelivery = new MessageDelivery($request->validate([
                'content' => 'required|max:1000',
            ]));
            $messageDelivery->sender()->associate(Auth::user());
            $messageDelivery->order()->associate($order);
            $messageDelivery->save();

            return redirect()->back()->with('sucess', 'Message envoyé');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Problème d\'enregistrement');
        }
    }
}
