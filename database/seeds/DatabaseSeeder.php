<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $authors = factory(\App\Models\Author::class, 5)->create();
        $authors->each(function ($author) {
            $author
                ->profile()
                ->save(factory(\App\Models\profile::class)->make());
            $author
                ->posts()
                ->saveMany(
                    factory(\App\Models\Post::class, rand(20,30))->make()
                );
        });
    }
}
