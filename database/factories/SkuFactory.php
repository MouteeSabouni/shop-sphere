<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sku>
 */
class SkuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'code' => fake()->bothify('??##??##'),
            'price' => fake()->randomFloat(2, 1, 4000),
            'quantity' => fake()->numberBetween(2, 100),
            'images' => ['https://source.unsplash.com/random', 'https://source.unsplash.com/random']
        ];
    }
}
