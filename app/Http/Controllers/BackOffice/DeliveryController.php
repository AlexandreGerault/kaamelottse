<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\MessageDelivery;
use Illuminate\Support\Facades\Auth;

/**
 * Permet de gérer la commande pour le livreur (prise en charge, paiement)
 */

class DeliveryController extends Controller
{

    public function __construct()
    {$this->middleware(function (Request $request, $next) {
        if (Auth::user()->can('access-backoffice')
            || Auth::user()->can('deliver')) {
            return $next($request);
        }
    });
    }

    /*
     *  Pour afficher les commandes prises en charge et celles disponibles
     */
    public function index()
    {
        $noDriverOrders = Order::where('status',config('ordering.status.PENDING'))->get();
        $currentOrders = Order::byDriver(Auth::user())->get();

        return view('backoffice.deliveries.available_orders', [
            'currentOrders' => $currentOrders,
            'availableOrders' => $noDriverOrders
        ]);
    }

    /*
     *  Affiche une livraion
     */
    public function delivery(Order $order)
    {
        try {
            return view('backoffice.deliveries.current_order', ['order' => $order]);
        } catch (ModelNotFoundException $e) {
            // TODO : handle ModelNotFoundException
        }
    }

    /*
     *  Pour prendre en charge une livraison
     */
    public function takeCharge(Order $order)
    {
        try {
            if (empty($order->delivery_driver_id) && $order->status != config('ordering.status.DELIVERED')){
                $order->deliveryDriver()->associate(Auth::user());
                $order->status = config('ordering.status.IN_DELIVERY');
                $order->save();
                return redirect()->back()->with('success', 'Commande prise en charge !');
            }

            return redirect()->back()->with('error', 'Commande déjà prise en charge !');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Commande introuvable !');
        }
    }

    /*
     *  Pour annuler une commande qui pose problème
     */
    public function cancel(Order $order)
    {
        try {
            if ($order->status == config('ordering.status.IN_DELIVERY')){
                $order->delivery_driver_id = NULL;
                $order->status = config('ordering.status.CANCELLED');
                $order->save();
                return redirect()->back()->with('success', 'Commande annulée avec sucess !');
            }

            return redirect()->back()->with('error', 'Annulation impossible !');

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Annulation impossible !');
        }
    }

    /*
     *  Pour envoyer un message associé à la livraison (demande précision, pb ou autre)
     */
    public function sendMessage(Request $request, Order $order)
    {
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

    /*
     *  Pour terminer une commande avec le paiement
     */
    public function endDelivery(Request $request, Order $order)
    {
        $data = $request->validate([
            'method_payment' => 'required|max:30'
        ]);

        try {
            if ($order->status == config('ordering.status.IN_DELIVERY')) {
                $order->status = config('ordering.status.DELIVERED');
                $order->method_payment = $data['method_payment'];
                $order->shipped_at = now('Europe/Paris');
                $order->paid_at = now('Europe/Paris');
                $order->save();

                return redirect(route('backoffice.deliver.index'))->with('sucess', 'Commande Livrée avec sucess !');
            }

            return redirect()->back()->with('error', 'Validation impossible !');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Validation impossible !');
        }
    }
}
