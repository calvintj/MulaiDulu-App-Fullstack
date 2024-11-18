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
                'expertise' => fake()->text(),
                'bio' => fake()->paragraph(), // Use paragraph text
                'rating' => fake()->randomFloat(1,4,5), // Use a valid date
                'image' => fake()->imageUrl(),
            ]);
        }
    }
}
