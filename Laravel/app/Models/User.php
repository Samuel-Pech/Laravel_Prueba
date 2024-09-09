<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'apellidos',
        'rol',
        'estatus',
        'correo',
        'contraseña',
        'fecha_alta',
        'fecha_baja',
        'fecha_modificacion',
    ];

    protected $hidden = [
    ];

    protected $casts = [
        'fecha_alta' => 'datetime',
        'fecha_baja' => 'datetime',
        'fecha_modificacion' => 'datetime',
    ];
}
