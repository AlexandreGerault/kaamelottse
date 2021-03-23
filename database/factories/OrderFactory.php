<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status'           => $this->faker->randomElement([0, 1, 2, 3]),
            'shipping_address' => str_replace(',', ' ', $this->faker->address),
            'method_payment'   => $this->faker->randomElement([null, 'liquide', 'carte bleu', 'chèque']),
            'total_points'     => $this->faker->randomNumber(4),
            'phone'            => $this->faker->phoneNumber,
            'delivery_rating'  => $this->faker->numberBetween(0, 5),
            'paid_at'          => $this->faker->randomElement([null, $this->faker->date()]),
            'shipped_at'       => $this->faker->randomElement([null, $this->faker->date()])
        ];
    }
}
