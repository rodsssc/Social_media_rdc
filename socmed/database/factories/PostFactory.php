<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'   => User::factory(),
            'content'   => $this->faker->sentence(),
            'image'     => $this->faker->imageUrl($width = 640, $height = 480, $category = 'nature', $randomize = true, $word = null),
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
