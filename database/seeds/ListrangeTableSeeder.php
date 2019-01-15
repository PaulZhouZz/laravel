<?php

use Illuminate\Database\Seeder;
use App\Models\PartitionModel;

class ListrangeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PartitionModel::class, 500)->create();
    }
}
