<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'origin' => $faker->randomElement(['Judicial', 'Administrativo'])
    ];
});
