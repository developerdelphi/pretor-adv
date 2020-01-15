<?php

use Faker\Generator as Faker;
use App\Models\Attribute;

$factory->define(Attribute::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement(['DOC','INFO']),
        'name' => $faker->unique()->word,
    ];
});
