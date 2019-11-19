<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'status' => $faker->randomElement([0, 1, 2, 3]),
        'total_price' => $faker->randomNumber(4),
        'shipping_address' => str_replace(',', ' ', $faker->address),
        'method_payment' => $faker->randomElement([null, 'liquide', 'carte bleu', 'chèque']),
        'total_points' => $faker->randomNumber(4),
        'phone' => $faker->phoneNumber,
        'delivery_rating' => $faker->numberBetween(0, 5),
        'paid_at' => $faker->randomElement([null, $faker->dateTime()]),
        'shipped_at' => $faker->randomElement([null, $faker->dateTimeThisMonth()])
    ];
});
