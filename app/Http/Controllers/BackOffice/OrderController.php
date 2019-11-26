<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
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
        $products = $request->products();

        /*
         * Create order
         */
        $order = new Order($request->only(['status', 'shipping_address', 'phone']));
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

        $order->selfUpdateTotals();

        return $this->index()->with('success', 'Commande créée manuellement avec succès');
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        /*
         * On commence par créer la commande avec des informations de bases
         */
        $order->update($request->validated());
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
        $users = User::noPendingOrder()
            ->where('email', 'LIKE', '%'. $request->get('email') . '%')
            ->select('email')
            ->get();

        return response()->json($users, 200);
    }

    public function statistics(Order $order)
    {
        $deliveredOrders = Order::validated();
    }
}
