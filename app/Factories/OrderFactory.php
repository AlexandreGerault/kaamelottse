<?php

namespace App\Factories;

use App\Models\Order;
use App\Models\User;

class OrderFactory
{
    /**
     * @param array $orderItems
     * @param array|null $options
     * @param User|null $customer
     * @param User|null $deliveryDriver
     * @return Order
     */
    public static function make(array $orderItems = null, array $options = null, User $customer = null, User $deliveryDriver = null) : Order
    {
        $order = new Order($options);

        if ($customer !== null) {
            $order->customer()->associate($customer);
        }
        if ($deliveryDriver !== null) {
            $order->customer()->associate($deliveryDriver);
        }
        if ($orderItems !== null) {
            foreach ($orderItems as $orderItem) {
                $order->items()->save($orderItem);
            }
        }

        $order->save();

        return $order;
    }
}
