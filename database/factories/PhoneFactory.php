<?php

use Faker\Generator as Faker;
use App\Models\Phone;

$factory->define(Phone::class, function (Faker $faker) {
    return [
        'number' => $faker->tollFreePhoneNumber,
        //'status' => null,
    ];
});
