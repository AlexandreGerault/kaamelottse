<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->title(),
        'description' => $faker->paragraph,
        'image' => $faker->imageUrl('200', '125'),
        'priority' => $faker->randomNumber(),
        'stock' => $faker->randomNumber(),
        'price' => $faker->randomFloat(2, 1, 20),
        'points' => $faker->randomNumber(),
        'available' => $faker->boolean,
    ];
});
