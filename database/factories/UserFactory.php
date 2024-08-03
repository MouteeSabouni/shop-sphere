<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    public function definition(): array
    {
        $firstName = $this->faker->firstName;
        $lastName = $this->faker->lastName;

        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => fake()->unique()->safeEmail(),
            'username' => $this->generateUsername($firstName, $lastName),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(60),
        ];
    }

    private function generateUsername($firstName, $lastName)
    {
        $username = $this->slugify($firstName) . '-' . $this->slugify($lastName);

        while (User::where('username', $username)->exists()) {
            $username = $this->slugify($firstName) . '-' . $this->slugify($this->faker->unique()->lastName);
        }

        return $username;
    }

    private function slugify(string $string): string
    {
        return strtolower(str_replace(' ', '', $string));
    }
}
