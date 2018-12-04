<?php

use Faker\Generator as Faker;
use App\Models\Users;

$factory->define(Users::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        'remember_token' => str_random(10),
        'votes' => mt_rand(1,10000),
        'is_vip' => 0
    ];
});
