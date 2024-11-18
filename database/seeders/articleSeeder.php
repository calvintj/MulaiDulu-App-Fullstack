<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use DB;

class articleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 27; $i++) {
            Article::insert([
                'judul' => fake()->text(10),
                'penulis' => fake()->name(),
                'isi_article' => fake()->paragraph(), // Use paragraph text
                'post_date' => fake()->date(), // Use a valid date
                'image' => fake()->imageUrl(),
            ]);
        }
    }
}
