<?php

use Faker\Generator as Faker;
use App\Models\Persona;

$factory->define(Persona::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'type' => $faker->randomElement(['F','J']),
        'status' => 'ativo',
        'excerpt' => $faker->paragraph,
    ];
});
