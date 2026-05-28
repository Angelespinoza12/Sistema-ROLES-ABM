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
            ['usuario' => 'omarqm'],
            [
                'name' => 'OMAR QUISPE MITA',
                'email' => 'omar@gmail.com',
                'password' => Hash::make('Omar411*'),
                'rol' => 'usuario',
            ]
        );
    }
}