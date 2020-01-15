<?php

use Faker\Generator as Faker;
use App\Models\Qualification;
use App\Models\Person;
use App\Models\Attribute;

$factory->define(Qualification::class, function (Faker $faker) {
    return [
        'persona_id'    => function () {
            // Get random persona id
            return Person::inRandomOrder()->first()->id;
        },
        'attribute_id'  => function () {
            // Get random atrribute id
            return Attribute::inRandomOrder()->first()->id;
        },
        'value'         => $faker->word,
    ];
});
