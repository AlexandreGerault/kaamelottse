<?php

namespace App\Listeners;

use App\Events\OrderShipped;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateOrderShippedAt
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OrderShipped $event)
    {
        $event->order->shipped_at = Carbon::now();
        $event->order->save();
    }
}
