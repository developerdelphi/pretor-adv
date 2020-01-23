<?php

namespace Modules\Lawyer\Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Lawyer\Entities\Persona;

class PersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();
        //$this->call("OthersTableSeeder");

        factory(Persona::class, 60)->create();
    }
}
