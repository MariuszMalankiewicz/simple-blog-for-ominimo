<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    public function run()
    {
        Comment::factory(50)->create(); // Tworzymy 50 przykładowych komentarzy
    }
}