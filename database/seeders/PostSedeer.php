<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
    'title' => 'First Post',
    'content' => 'This is the content of the first demo post',
    'photo' => 'post1.jpg',
    'category_id' => 1,
]);

Post::create([
    'title' => 'Second Post',
    'content' => 'This is the content of the second post',
    'photo' => 'post2.jpg',
    'category_id' => 2,
]);

    }
}
