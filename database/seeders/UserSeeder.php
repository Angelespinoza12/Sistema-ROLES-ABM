<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
    
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'nombre' => 'Administrador Principal',
                'usuario' => 'admin',
                'password' => Hash::make('Admin123*'),
                'rol' => 'admin'
            ]
        );


        User::updateOrCreate(
            ['email' => 'user1@gmail.com'],
            [
                'nombre' => 'Usuario Uno',
                'usuario' => 'user1',
                'password' => Hash::make('123456'),
                'rol' => 'user'
            ]
        );

        User::updateOrCreate(
            ['email' => 'user2@gmail.com'],
            [
                'nombre' => 'Usuario Dos',
                'usuario' => 'user2',
                'password' => Hash::make('123456'),
                'rol' => 'user'
            ]
        );

        User::updateOrCreate(
            ['email' => 'user3@gmail.com'],
            [
                'nombre' => 'Usuario Tres',
                'usuario' => 'user3',
                'password' => Hash::make('123456'),
                'rol' => 'user'
            ]
        );

        User::updateOrCreate(
            ['email' => 'omar@gmail.com'],
            [
                'nombre' => 'omarqm',
                'usuario' => 'omarqm',
                'password' => Hash::make('Omar411*'),
                'rol' => 'user'
            ]
        );
    }
}