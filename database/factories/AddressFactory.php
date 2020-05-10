<?php

use Faker\Generator as Faker;
use App\Models\Address;

$factory->define(Address::class, function (Faker $faker) {
    return [
       /* 'persona_id'    => function () {// Get random persona id
            return Person::inRandomOrder()->first()->id;
        },
        */
        'place'         => $faker->streetAddress,
        'district'      => $faker->state,
        'complement'    => $faker->secondaryAddress,
        'city'          => $faker->city,
        'uf'            => $faker->randomElement(['GO','PA','GO','DF','GO','MG','GO','TO']),
        'cep'           => rand(70000000,99999999),
        'postal'        => $faker->postcode,
        'obs'           => $faker->paragraph,
    ];
});
