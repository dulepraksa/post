<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();


        $post = factory(App\Post::class, 20)->create([
            'title' => $faker->title,
            'body' => $faker->text,
            'user_id' => 1
        ]);
    }
}
