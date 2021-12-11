<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::where('id', '>', 0)->pluck('id')->toArray();
        $posts = Post::where('id', '>', 0)->pluck('id')->toArray();

        return [
            'text'=> $this->faker->sentence(),
            'user_id'=> $users[array_rand($users)],
            'post_id'=> $posts[array_rand($posts)],
        ];
    }
}
