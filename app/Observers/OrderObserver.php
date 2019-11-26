<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Validation\ValidationException;
use mysql_xdevapi\Exception;

class OrderObserver
{
    /**
     * Handle the order "created" event.
     *
     * @param Order $order
     * @return void
     */
    public function created(Order $order)
    {
    }

    /**
     * Handle the order "updated" event.
     *
     * @param Order $order
     * @return void
     */
    public function updated(Order $order)
    {
        $order->selfUpdateTotals();


    }

    public function updating(Order $order)
    {

        // TODO : Find a better way of doing this

        /*
         * If the status field of the command has changed & is now equals to PENDING then
         */
        if ($order->isDirty('status') && $order->getDirty()['status'] == config('ordering.status.PENDING')) {
            $errors = array();
            /*
             * We return false if one of the product isn't available (stopping the event's propagation)
             */
            $order->items()->each(function (OrderItem $item) {
                $product = $item->product;
                if ($product->stock - $item->quantity < 0) {
                    $errors[$product->id] = 'Le produit ' . $product->name . ' n\'est plus disponible en assez grande quantité';
                }
            });

            if (!empty($errors)) {
                return false;
            }

            /*
             * Then we update the stocks
             */
            $order->items()->each(function (OrderItem $item) {
                $product = $item->product;
                $product->stock -= $item->quantity;
                $product->save();
            });
        }
    }
    /**
     * Handle the order "deleted" event.
     *
     * @param Order $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the order "restored" event.
     *
     * @param Order $order
     * @return void
     */
    public function restored(Order $order)
    {
        $order->selfUpdateTotals();
    }

    /**
     * Handle the order "force deleted" event.
     *
     * @param Order $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
