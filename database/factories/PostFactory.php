<?php

namespace Database\Factories;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' =>fake()->title(),
            'user_id' =>User::factory(),
            'content' => fake()->text(200),
            'image' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'),
        ];
    }
}
