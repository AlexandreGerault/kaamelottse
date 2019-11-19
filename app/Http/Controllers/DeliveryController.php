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
}
