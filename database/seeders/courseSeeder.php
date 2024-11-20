<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class courseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Course::insert([
                'name' => fake()->name(), // Limit to 50 characters for title
                'description' => fake()->text(10),
                'image' => fake()->imageUrl(),
                'price' => fake()->numberBetween(10000, 100000),
            ]);
        }
    }
}
