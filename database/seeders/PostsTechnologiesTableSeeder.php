<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Technology;


class PostsTechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){

            $post = Post::inRandomOrder()->first();
            $technology_id = Technology::inRandomOrder()->first();
            $post->technologies()->attach($technology_id);

        }
    }
}
