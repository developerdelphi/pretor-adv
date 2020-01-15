<?php

use Faker\Generator as Faker;
use App\Models\Area;

$factory->define(App\Models\Kind::class, function (Faker $faker) {
    return [
        'name'      => $faker->word,
        'area_id'   => function () {
            // Get random area id
            return Area::inRandomOrder()->first()->id;
        },
    ];
});
