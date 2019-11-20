<?php

namespace App\Factories;

use App\Models\Order;
use App\User;

class OrderFactory
{
    /**
     * @param array $orderItems
     * @param array|null $options
     * @param User|null $customer
     * @param User|null $deliveryDriver
     * @return bool
     */
    public static function make(array $orderItems, array $options = null, User $customer = null, User $deliveryDriver = null) : bool
    {
        $order = new Order($options);

        if ($customer !== null) {
            $order->customer()->associate($customer);
        }
        if ($deliveryDriver !== null) {
            $order->customer()->associate($deliveryDriver);
        }
        foreach ($orderItems as $orderItem) {
            $order->items()->save($orderItem);
        }

        return $order->save();
    }
}