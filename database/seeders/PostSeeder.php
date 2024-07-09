<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->count(10)->create();


        // other method to do is deine here

        // Create 10 posts with a sequence of different attributes
//        Post::factory()->count(10)->sequence(
//            fn ($sequence) => [
//                'title' => fake()->sentence,
//                'content' => fake()->text(200),
//                'image' => fake()->imageUrl(),
//            ]
//        )->create();
    }
}
