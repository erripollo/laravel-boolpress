<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $post = new Post();
            $post->title = $faker->sentence(4);
            $post->image = $faker->imageUrl(640, 480, 'Post', true, $post->title);
            $post->summary = $faker->text();
            $post->body = $faker->text(2000);
            $post->save();
        }
    }
}
