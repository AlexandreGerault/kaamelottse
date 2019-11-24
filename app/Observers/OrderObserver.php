<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\OrderItem;

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

        /*
         * If the status field of the command has changed & is now equals to PENDING then
         */
        if ($order->isDirty('status') && $order->status == config('ordering.status.PENDING')) {
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
