<?php

namespace Modules\Lawyer\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LawyerDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();

        $this->call(AreaTableSeeder::class);
        $this->call(EntityTableSeeder::class);
        $this->call(PersonaTableSeeder::class);
    }
}
