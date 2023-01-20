<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jugadores extends Model
{
    use HasFactory;

    protected $fillable = [
        'nivel',
        'nombre',
        'password',
        'posicions_id',
        'equipo_id',

    ];

}
