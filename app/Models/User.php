<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'usuario',
        'rol',
        'telefono',
        'cargo',
        'universidad',
        'aula',
        'semestre',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

