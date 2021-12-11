<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //generate mass data
        Comment::factory()->count(2500)->create()->each(function ($comment) {
            $comment->save();
        });
    }
}
