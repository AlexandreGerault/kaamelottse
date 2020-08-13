<?php

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\User;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = factory(Order::class, 10)
            ->create([
                'customer_id' => User::all()->random()->id,
                'delivery_driver_id' => User::all()->random()->id,
            ])
            ->each(function (Order $order) {
                $order->customer_id = User::all()->random()->id;
                $order->delivery_driver_id = User::all()->random()->id;
                $order->save();

                factory(OrderItem::class, 3)->create([
                    'order_id' => $order->id,
                    'product_id' => 1,
                ])->each(function (OrderItem $orderItem) use ($order) {
                    $orderItem->product_id = Product::all()->random()->id;
                    $orderItem->order()->associate($order);
                    $orderItem->save();
                });

                $order->save();
                $order->selfUpdateTotals();
            });
    }
}
