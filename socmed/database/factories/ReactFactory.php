<?php

namespace Database\Factories;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\React>
 */
class ReactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        
            'user_id' => User::factory(),  // Assumes you have a UserFactory
            'post_id' => Post::factory(),  // Assumes you have a PostFactory
            'action' => $this->faker->randomElement(['like', 'love', 'haha', 'wow', 'sad', 'angry']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
