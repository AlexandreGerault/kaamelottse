<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:access-backoffice');
    }

    public function index()
    {
        try {
            $this->authorize('viewAny', Order::class);
            $orders = Order::with(['customer', 'deliveryDriver'])
                ->orderBy('updated_at', 'desc')
                ->paginate(config('paginate.backoffice.order.index'));
            return view('backoffice.orders.index')
                ->with('orders', $orders);
        } catch (AuthorizationException $e) {
            abort(403);
        }
    }

    public function create()
    {
        try {
            $this->authorize('create', Order::class);

            return view('backoffice.orders.create')
                ->with('action', route('backoffice.order.store'));
        } catch (AuthorizationException $e) {
        }
    }

    public function edit(Order $order)
    {
        return view('backoffice.orders.create')
            ->with('order', $order)
            ->with('action', route('backoffice.order.update', ['order' => $order]))
            ->with('method', 'PUT');
    }

    public function show(Order $order)
    {
        try {
            $this->authorize('view', $order);
            return view('backoffice.orders.show')->with('order', $order);
        } catch (AuthorizationException $e) {
            return back()->with('error', 'Vous n\'avez pas le droit d\'accéder à cette commande');
        }
    }

    public function store(StoreOrderRequest $request)
    {
        try {
            $this->authorize('create', Order::class);
        } catch (AuthorizationException $e) {
            return back()->with('error', 'Vous n\'avez pas le droit de créer une commande');
        }

        $products = array();
        $totalPrice = 0;
        $totalPoints = 0;

        /*
         * Check for each product that we have enough in stock
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
         * Create order
         */
        $order = new Order(array_merge($request->only(['status', 'shipping_address', 'phone']),
            ['total_points' => $totalPoints, 'total_price' => $totalPrice]));
        $order->customer()->associate(User::where('email', $request->customer_email)->first());
        $order->save();

        /*
         * Add orderItems to order
         */
        foreach ($products as $product) {
            $orderItem = new OrderItem(['quantity' => $request->get($product->id)]);
            $orderItem->order()->associate($order);
            $orderItem->product()->associate($product);
            $orderItem->save();
        }

        return $this->index()->with('success', 'Commande créée manuellement avec succès');
    }

    public function update(Request $request, Order $order)
    {
        try {
            $this->authorize('update', $order);
        } catch (AuthorizationException $e) {
            return back()->with('error', 'Action non autorisée');
        }

        $validator = Validator::make($request->only(['status', 'shipping_address', 'phone']), [
            'status' => 'required|numeric',
            'shipping_address' => 'required|string',
            'phone' => 'required|string'
        ]);

        /*
         * On commence par créer la commande avec des informations de bases
         */
        try {
            $order->update($validator->validated());
        } catch (ValidationException $e) {
            return back()->with('error', 'Erreur de validation');
        }

        $order->customer()->associate(User::where('email', $request->customer_email)->first());
        $order->save();

        return redirect()->route('backoffice.order.show', ['order' => $order]);
    }

    public function destroy(Order $order)
    {
        try {
            $this->authorize('delete', Order::class);
        } catch (AuthorizationException $e) {
            // TODO: Handle AuthorizationException
        }

        Order::destroy($order->id);

        return redirect()->route('backoffice.order.index');
    }

    public function usernameAutocomplete(Request $request)
    {
        $users = User::noPendingOrder()->where('email', 'LIKE', '%'. $request->get('email') . '%')->select('email')->get();

        return response()->json($users, 200);
    }
}
