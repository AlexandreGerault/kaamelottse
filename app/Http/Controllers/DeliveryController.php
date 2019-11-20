<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\Product;

/*
 *Permet de gérer la commande pour le livreur (prise en charge, paiement)
 *
 */
class DeliveryController extends Controller
{
    /*
     *  Pour afficher les commandes prises en charge et celles disponibles
     */
    public function index(){
        $currentOrders = Order::where(['delivery_driver_id' => Auth::id(), 'status' => 1])->get();

        $availlableOrders = Order::where('status', 0)->orderBy('updated_at', 'desc')->limit(10)->get();

        return view('gest.deliveries.availlable_orders', ['currentOrders' => $currentOrders, 'availlableOrders' => $availlableOrders]);
    }

    public function delivery($id){
        if ($order = Order::where('id', $id)->first()){
            return view('gest.deliveries.current_order', ['order' => $order]);
        }
    }

    public function takeCharge($id){
        if ($order = Order::where('id', $id)->first()){
            if (empty($order->delivery_driver_id) && $order->status!=2){
                $order->delivery_driver_id = Auth::id();
                $order->status = 1;
                $order->save();
                return redirect()->back()->with('sucess', 'Commande prise en charge !');
            }
            return redirect()->back()->with('error', 'Commande déjà prise en charge !');
        }
        return redirect()->back()->with('error', 'Commande introuvable !');
    }

    public function cancel($id){
        if ($order = Order::where(['id' => $id, 'delivery_driver_id' => Auth::id()])->first()){
            if ($order->status==1){
                $order->delivery_driver_id = NULL;
                $order->status = 3;
                $order->save();
                return redirect()->back()->with('sucess', 'Commande annulée avec sucess !');
            }
            return redirect()->back()->with('error', 'Annulation impossible !');
        }
        return redirect()->back()->with('error', 'Annulation impossible !');
    }
}
