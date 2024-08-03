<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'user_id' => User::factory(),
            'description' => fake()->paragraph(),
            'logo' => 'https://source.unsplash.com/random',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
