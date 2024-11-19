<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Expert;

class expertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 6; $i++) {
            Expert::insert([
                'name' => fake()->name(), // Limit to 50 characters for title
                'expertise' => fake()->text(10),
                'bio' => fake()->paragraph(), // Use paragraph text
                'rate_price' => fake()->numberBetween(10000, 100000),
                'rating' => fake()->randomFloat(1,4,5), // Use a valid date
                'image' => fake()->imageUrl(),
            ]);
        }
    }
}
