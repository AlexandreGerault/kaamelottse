<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$products = Product::where([['available', 1],['stock', '>', 0]])->orderBy('priority')->limit(3)->get();
		$orders = Order::where('customer_id', Auth::id())->orderBy('updated_at')->get();
		
        return view('users/tdb', ['products' => $products, 'orders' => $orders]);
    }
}
