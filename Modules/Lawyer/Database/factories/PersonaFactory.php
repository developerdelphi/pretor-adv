<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Lawyer\Entities\Persona;

$factory->define(Persona::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'qualifications' =>
        [
            'tipo' => $faker->randomElement(['Física', 'Jurídica']),
            'cpf' => $faker->cpf,
            'rg' => $faker->rg,
            'celular' => $faker->cellphoneNumber,
            'estado_civil' => $faker->randomElement(['Casado(a)', 'Divorciado(a)', 'Solteiro(a)', 'Viúvo(a)', 'União Estável']),
            'profissao' => $faker->word,
            'nacionalidade' => 'Brasileira',
            'logradouro' => $faker->streetName,
            'numero' => $faker->buildingNumber,
            'bairro' => $faker->city,
            'cidade' => $faker->city,
            'pais' => $faker->country,
        ],
    ];
});
