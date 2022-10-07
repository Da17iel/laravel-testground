<?php

namespace Database\Seeders;

use App\Models\Replies;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Comments;


class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Post::factory(15)->create();
        Comments::factory(30)->create();
        Replies::factory(30)->create();

        $this->call([
            CommentsSeeder::class,
        ]);
    }

}
