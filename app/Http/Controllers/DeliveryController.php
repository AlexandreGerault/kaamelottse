<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\Order;
use App\Models\Product;
use App\Models\MessageDelivery;

/*
 *Permet de gérer la commande pour le livreur (prise en charge, paiement)
 *
 */

define(commande_en_cours, 0);
define(livraison_en_attente, 1);
define(livraison_en_cours, 2);
define(livraison_terminee, 3);
define(livraison_annulee, 4);

class DeliveryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');  //Ceci peut être utile, y compris en début ! Et oui...
    }

    /*
     *  Pour afficher les commandes prises en charge et celles disponibles
     */
    public function index(){
        $currentOrders = Order::where(['delivery_driver_id' => Auth::id(), 'status' => livraison_en_cours])->get();

        $availlableOrders = Order::where('status', 1)->orderBy('updated_at', 'desc')->limit(10)->get();

        return view('gest.deliveries.availlable_orders', ['currentOrders' => $currentOrders, 'availlableOrders' => $availlableOrders]);
    }

    /*
     *  Affiche une livraion
     */
    public function delivery($id){
        if ($order = Order::where('id', $id)->first()){
            return view('gest.deliveries.current_order', ['order' => $order]);
        }
    }

    /*
     *  Pour prendre en charge une livraison
     */
    public function takeCharge($id){
        if ($order = Order::where('id', $id)->first()){
            if (empty($order->delivery_driver_id) && $order->status!=3){
                $order->delivery_driver_id = Auth::id();
                $order->status = 2;
                $order->save();
                return redirect()->back()->with('sucess', 'Commande prise en charge !');
            }
            return redirect()->back()->with('error', 'Commande déjà prise en charge !');
        }
        return redirect()->back()->with('error', 'Commande introuvable !');
    }

    /*
     *  Pour annuler une commande qui pose problème
     */
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

    /*
     *  Pour envoyer un message associé à la livraison (demande précision, pb ou autre)
     */
    public function sendMessage(Request $request, $id){
        $messageDelivery = new MessageDelivery($request->validate([
            'content' => 'required|max:1000',
        ]));
        $messageDelivery->user_sender_id = Auth::id();
        $messageDelivery->order_id = $id;

        if ($messageDelivery->save()){
            return redirect()->back()->with('sucess', 'Message envoyé');
        }
        return redirect()->back()->with('error', 'Problème d\'enregistrement');
    }

    /*
     *  Pour terminer une commande avec le paiement
     */
    public function endDelivery(Request $request, $id){
        $data = $request->validate([
            'method_payment' => 'required|max:30'
        ]);
        if ($order = Order::where(['id' => $id, 'delivery_driver_id' => Auth::id()])->first()){
            if ($order->status<=1){
                $order->status = 2;
                $order->method_payment = $data['method_payment'];
                $order->paid_at = date('Y-m-d H:i:s');
                $order->save();
                return redirect('/deliver')->with('sucess', 'Commande Livrée avec sucess !');
            }
            return redirect()->back()->with('error', 'Validation impossible !');
        }
        return redirect()->back()->with('error', 'Validation impossible !');
    }
}
