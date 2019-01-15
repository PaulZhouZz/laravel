<?php

use Faker\Generator as Faker;
use App\Models\PartitionModel;

$factory->define(PartitionModel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
