<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'promedio',
        'nombre',
        'password',
        'deporte_id',
        'entrenador_id',
        'user_id',

    ];

}
