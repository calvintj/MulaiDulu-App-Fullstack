<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class reviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Review::insert([
                'name' => fake()->name(),
                'review' => fake()->paragraph(),
                'image' => fake()->imageUrl(),
            ]);
        }
    }
}
