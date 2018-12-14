<?php

use Illuminate\Database\Seeder;

class PodcastTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Podcast::class, 50)->create();
    }
}
