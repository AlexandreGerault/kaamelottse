<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
		$products = Product::where([['available', 1],['stock', '>', 0]])->orderBy('priority')->limit(3)->get();
		$orders = Order::where('customer_id', Auth::id())->orderBy('updated_at')->get();

        return view('frontoffice.dashboard', ['products' => $products, 'orders' => $orders]);
    }
}
