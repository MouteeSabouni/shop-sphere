<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\ProductStatus;
use App\Models\User;
use App\Models\Brand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $wordsNumber = rand(4, 12);

        $words = array_map('ucfirst', fake()->words($wordsNumber));

        $name = implode(' ', $words);

        return [
            'user_id' => User::factory(),
            'brand_id' => Brand::factory(),
            'name' => $name,
            'description' => fake()->paragraph(),
            'status' => ProductStatus::Active->value,
            'manufacturer' => fake()->word(),
            'material' => fake()->word(),
        ];
    }
}
