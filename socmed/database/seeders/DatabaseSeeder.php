<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\React;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 5 users
        $users = User::factory(5)->create();

        // For each user, create posts
        $users->each(function ($user) {
            $posts = Post::factory(3)->create([
                'user_id' => $user->id
            ]);

            // For each post, create comments and reactions
            $posts->each(function ($post) use ($user) {
                // Create comments by random users
                Comment::factory(2)->create([
                    'user_id' => User::inRandomOrder()->first()->id,
                    'post_id' => $post->id,
                ]);

                // Create reactions for the post
                React::factory(4)->create([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                    'action' => 'like', // or randomize if needed
                ]);
            });
        });
    }
}
