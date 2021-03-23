<?php

namespace Database\Factories;

use App\Models\StockOperation;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockOperationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StockOperation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => $this->faker->randomNumber(),
        ];
    }
}
