<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN
    
User::updateOrCreate(
    ['usuario' => 'admin'],
    [
        'name' => 'Administrador',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('12345678'),
        'rol' => 'admin',

        'telefono' => '70000000',
        'cargo' => 'Administrador',
        'universidad' => 'Universidad Salesiana',
        'aula' => 'Central',
        'semestre' => 'Administracion',
    ]
);



        // JUAN
        User::updateOrCreate(
            ['usuario' => 'juan'],
            [
                'name' => 'Juan Perez',
                'email' => 'juan@gmail.com',
                'password' => Hash::make('12345678'),
                'rol' => 'usuario',

                'telefono' => '77711111',
                'cargo' => 'Estudiante',
                'universidad' => 'USB',
                'aula' => '201',
                'semestre' => '5to',
            ]
        );

        // MARIA
        User::updateOrCreate(
            ['usuario' => 'maria'],
            [
                'name' => 'Maria Lopez',
                'email' => 'maria@gmail.com',
                'password' => Hash::make('12345678'),
                'rol' => 'usuario',

                'telefono' => '77722222',
                'cargo' => 'Estudiante',
                'universidad' => 'USB',
                'aula' => '305',
                'semestre' => '6to',
            ]
        );

        // CARLOS
        User::updateOrCreate(
            ['usuario' => 'carlos'],
            [
                'name' => 'Carlos Rojas',
                'email' => 'carlos@gmail.com',
                'password' => Hash::make('12345678'),
                'rol' => 'usuario',

                'telefono' => '77733333',
                'cargo' => 'Auxiliar',
                'universidad' => 'USB',
                'aula' => 'Laboratorio',
                'semestre' => '8vo',
            ]
        );

        // OMAR
        User::updateOrCreate(
            ['usuario' => 'omarqm'],
            [
                'name' => 'Omar',
                'email' => 'omar@gmail.com',
                'password' => Hash::make('Omar411*'),
                'rol' => 'usuario',

                'telefono' => '77224954',
                'cargo' => 'DOCENTE',
                'universidad' => 'Universidad Salesiana de Bolivia',
                'aula' => '111',
                'semestre' => '7mo Semestre',
            ]
        );
       
User::updateOrCreate(
    ['usuario' => 'admin2'],
    [
        'name' => 'Administrador 2',
        'email' => 'admin2@gmail.com',
        'password' => bcrypt('12345678'),
        'rol' => 'admin',

        'telefono' => '77777777',
        'cargo' => 'Administrador',
        'universidad' => 'Universidad Salesiana',
        'aula' => 'Central',
        'semestre' => 'Admin',
    ]
);


    }
}

