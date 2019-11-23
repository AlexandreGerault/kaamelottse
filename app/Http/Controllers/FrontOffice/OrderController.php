<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
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
                ->with('products', Product::available()->get());
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

    public function store(OrderRequest $request)
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

        return $this->index()->with('success', 'Commande créée manuellement avec succès');
    }

    public function update(Request $request, Order $order)
    {
        try {
            $this->authorize('update', $order);
        } catch (AuthorizationException $e) {
            return back()->with('error', 'Vous ne pouvez pas modifier la commande');
        }

        $products = array();
        $orderItems = array();
        $totalPrice = 0;
        $totalPoints = 0;

        /*
         * On vérifie que chaque produit existe et est disponible
         * => A REFACTORISE POUR UN CODE REUTILISABLE
         * => SERA REUTILISER POUR LE UserOrderController
         */
        foreach ($request->except(['_token', 'customer_email', 'shipping_address', 'customer_phone']) as $productId => $quantity) {
            if ($quantity == 0) continue;
            elseif ($quantity != (int) $quantity) continue;

            $product = Product::find($productId);
            if ($product && $product->available) {
                $products[] = $product;

                $totalPoints += $quantity * $product->points;
                $totalPrice += $quantity * $product->price;
            }
        }

        /*
         * On commence par créer la commande avec des informations de bases
         */
        $order->update(array_merge($request->only(['status', 'shipping_address', 'phone']),
            ['total_points' => $totalPoints, 'total_price' => $totalPrice]));
        $order->customer()->associate(User::where('email', $request->customer_email)->first());
        $order->save();

        /*
         * On ajoute tout les produits commandés à la commande
         */
        foreach ($products as $product) {
            $orderItem = null;
            if(OrderItem::find($order->items()->byProduct($product)->first())) {
                $orderItem = OrderItem::find($order->items()->byProduct($product)->first()->id);
            } else {
                $orderItem = new OrderItem();
                $orderItem->order()->associate($order);
                $orderItem->product()->associate($product);
            }
            $orderItem->quantity = $request->get($product->id);
            $orderItem->save();
        }

        return $this->show($order)->with('success', 'Commande éditée manuellement avec succès');
    }

    public function destroy(Order $order)
    {
        try {
            $this->authorize('delete', Order::class);
        } catch (AuthorizationException $e) {
            return back()->with('error', 'Vous ne pouvez pas supprimer la commande');
        }

        Order::destroy($order->id);

        return $this->index()->with('success', 'Commande supprimée avec succès');
    }

    public function usernameAutocomplete(Request $request)
    {
        $users = User::noPendingOrder()->where('email', 'LIKE', '%'. $request->get('email') . '%')->select('email')->get();

        return response()->json($users, 200);
    }
}
