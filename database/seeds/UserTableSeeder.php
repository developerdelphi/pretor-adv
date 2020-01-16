<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leo = User::create([
            'name'      => 'Oleomar Buchner',
            'email'     => 'leo@pretor.com.br',
            'password'  => Hash::make('password'),
        ]);
    /*
        $roleAdmin = new Role();
        $roleAdmin->name = 'Administrador';
        $roleAdmin->slug = 'administrador';
        $roleAdmin->description = 'Administra o sistema';
        $roleAdmin->save();

        $roleAdvogado = new Role();
        $roleAdvogado->name = 'Advogado';
        $roleAdvogado->slug = 'advogado';
        $roleAdvogado->description = 'Gerenciamento de Processos Relacionados ao Usuário';
        $roleAdvogado->save();
    */
    }
}
