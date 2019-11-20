<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
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
        $products = array();
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
        $order = new Order;
        $order->customer()->associate(User::where('email', $request->customer_email)->first());
        $order->status = 0;
        $order->shipping_address = $request->get('shipping_address');
        $order->phone = $request->get('customer_phone');
        $order->save();
        $order->total_points = $totalPoints;
        $order->total_price = $totalPrice;
        $order->save();

        /*
         * On ajoute tout les produits commandés à la commande
         */
        foreach ($products as $product) {
            $orderItem = new OrderItem();
            $orderItem->order()->associate($order);
            $orderItem->product()->associate($product);
            $orderItem->quantity = $request->get($product->id);
            $orderItem->save();
        }

        return $this->index()->with('success', 'Commande créée manuellement avec succès');
    }

    public function usernameAutocomplete(Request $request)
    {
        $users = User::noPendingOrder()->where('email', 'LIKE', '%'. $request->get('email') . '%')->select('email')->get();

        return response()->json($users, 200);
    }
}
