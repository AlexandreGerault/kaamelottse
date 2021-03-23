<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText(20),
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl('200', '125'),
            'priority' => $this->faker->randomNumber(),
            'stock' => $this->faker->randomNumber(),
            'price' => $this->faker->randomFloat(2, 1, 5),
            'points' => $this->faker->randomNumber(2),
            'available' => $this->faker->boolean(),
        ];
    }
}
