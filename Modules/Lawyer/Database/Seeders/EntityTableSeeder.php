<?php

namespace Modules\Lawyer\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Lawyer\Entities\Entity;

class EntityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'TJGO - Tribunal de Justiça do Estado de Goiás',
            'TJGO/Anápolis - 1ª Vara Cível',
            'TJGO/Anápolis - 1ª Vara de Família e Sucessões',
            'TJGO/Anápolis - 2º Juizado Especial Cível',
            'TRF1 - Tribunal Regional Federal da 1ª Região',
            'TRF1/GO - Seção Judiciária de Goiás',
            'TRF1/GO-Anápolis - 1º Juizado Especial Cível',
            'TRF1/GO-Anápolis - 2º Vara Cível e Criminal',
        ];
        foreach ($data as $value) {
            # code...
            Entity::create(['name' => $value]);
        }
    }
}
