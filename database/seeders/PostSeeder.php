<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory()->count(100)->make();

        $posts->chunk(20)->each(function ($chunk) {
            DB::table('posts')->insert($chunk->toArray());
        });
    }
}
