<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SkuSeeder::class,
            UserSeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
            CategorySeeder::class,
            AttributeSeeder::class,
            SepcificationSeeder::class,
            AttributeOptionsSeeder::class,
        ]);

    }
}
