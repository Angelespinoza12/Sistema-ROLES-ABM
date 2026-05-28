<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'OMAR QUISPE MITA',
            'email' => 'omar@gmail.com',
            'username' => 'omarqm',
            'rol' => 'usuario',
            'password' => Hash::make('Omar411*'),
        ]);

        User::create([
            'name' => 'Angel Fernando Espinoza',
            'email' => 'fernando@gmail.com',
            'username' => 'fernando',
            'rol' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
    }
}