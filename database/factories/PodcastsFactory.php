<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Podcast::class, function (Faker $faker) {
    return [
        'aa' => str_random(5),
        'bb' => str_random(5),
        'cc' => str_random('5')
    ];
});
