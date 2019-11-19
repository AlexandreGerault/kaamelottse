<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CommandeController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')->get();
        
        return view('banquet')
            ->with('products', $products);
    }
}
