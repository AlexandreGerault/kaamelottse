<?php

namespace App;

use App\Models\Order;
use App\Models\Product;
use App\Models\StockOperation;

class OrderValidator
{
    private $order;
    private $errors;

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->errors = [];
    }

    /**
     * @param array|null $orderItems An array of OrderItem
     * @return bool
     */
    public function isStockEnough(array $orderItems = null) : bool
    {
        if ($orderItems == null) {
            $orderItems = $this->order->items();
        }

        foreach ($orderItems as $orderItem)
        {
            $product = $orderItem->product;
            $quantity = $orderItem->quantity;
            $operations = StockOperation::byProduct($product);
            $operations->each(function ($operation) use ($quantity) {
                $quantity -= $operation->quantity;
            });

            if($quantity > $product->stock) {
                $this->errors['stock'] = 'Stock insuffisant';
                return false;
            }
        }
        return true;
    }

    /**
     * @param array|null $orderItems
     * @param int|null $max
     * @return bool
     */
    public function isTotalLowerThanMax(array $orderItems = null, $max = null) : bool
    {
        if ($orderItems == null)  $orderItems = $this->order->items();
        if ($max == null) $max = config('ordering.max_total_price');

        $total = 0;

        foreach ($orderItems as $orderItem) {
            $total += $orderItem->product->price * $orderItem->quantity;
        }

        if ($total > $max) {
            $this->errors['total_price'] = 'Le montant de la commance excède le montant maximum autorisé';
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function userDoesntHaveOtherPendingOrder() : bool
    {
        if(! User::noPendingOrder()->get()->contains($this->order->customer)){
            $this->errors['user'] = 'L\'utilisateur a déjà une commande en cours';

            return false;
        }
        return true;
    }
}