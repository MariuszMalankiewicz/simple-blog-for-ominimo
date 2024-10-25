<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::factory(20)->create(); // Tworzymy 20 przykładowych postów
    }
}