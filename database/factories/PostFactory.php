<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::where('id', '>', 0)->pluck('id')->toArray();
        $files = Storage::disk('public')->allFiles('post_images');
        $fname =  $files[array_rand($files)];

        return [
            'title' => $this->faker->sentence(),
            'image' => substr($fname, 12, strlen($fname)),
            'content' => $this->faker->paragraph(mt_rand(2, 20)),
            'likes' => rand(0, 1500),
            'user_id' => $users[array_rand($users)],
        ];
    }
}
