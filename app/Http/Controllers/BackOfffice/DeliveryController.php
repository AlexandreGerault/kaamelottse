<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Product;
use App\Models\MessageDelivery;
use Illuminate\Support\Facades\Auth;

/**
 * Permet de gérer la commande pour le livreur (prise en charge, paiement)
 *
 */

class DeliveryController extends Controller
{

    public function index()
    {
    }

}
