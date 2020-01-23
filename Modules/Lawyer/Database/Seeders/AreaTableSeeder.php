<?php

namespace Modules\Lawyer\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Lawyer\Entities\Area;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();
        $data = [
            'Cível',
            'Penal',
            'Previdenciário',
            'Consumidor',
            'Trabalhista',
            'Família',
            'Fazenda Pública Municipal',
            'Fazenda Pública Estadual',
            'Fazenda Pública Federal',
            'Tributário',
            'Infância e Juventude',
            'Trânsito',
            'Militar',
        ];
        foreach ($data as $value) {
            # code...
            Area::create(['name'=>$value]);
        }
    }
}
