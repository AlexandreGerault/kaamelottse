<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\MessageDelivery;
use Auth;

class IndexController extends Controller
{

    public function index()
    {
        if (!Auth::user()->hasRole('éditeur') or !Auth::user()->hasRole('administrateur')) {
            return abort(404);
        }

        $pentind_orders = Order::where('status', config('ordering.status.PENDING'))->orderBy('created_at')->limit(40)->get();
        $in_delivering_orders = Order::where(['status' => config('ordering.status.IN_DELIVERY')])->orderBy('created_at')->limit(40)->get();
        $last_messages = MessageDelivery::orderBy('created_at')->limit(20)->get();

        $nb_penting_orders = Order::where(['status' => config('ordering.status.PENDING')])->count();
        $nb_in_delivering_orders = Order::where(['status' => config('ordering.status.IN_DELIVERY')])->count();
        $nb_delivered_orders = Order::where(['status' => config('ordering.status.DELIVERED')])->count();
        //$nb_delivered_orders = Order::where(['status', config('ordering.status.DELIVERED')])->count();

        return view('backoffice.index', ['pentind_orders' => $pentind_orders,
                              'in_delivering_orders' => $in_delivering_orders,
                              'last_messages' => $last_messages,
                              'nb_penting_orders' => $nb_penting_orders,
                              'nb_in_delivering_orders' => $nb_in_delivering_orders,
                              'nb_delivered_orders' => $nb_delivered_orders]);
    }

}
