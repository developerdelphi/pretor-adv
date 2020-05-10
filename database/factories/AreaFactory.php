<?php

use Faker\Generator as Faker;
use App\Models\Area;

$factory->define(Area::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'origin' => $faker->random('Judicial','Administrativo'),
    ];
});
