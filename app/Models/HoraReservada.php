<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoraReservada extends Model
{
    protected $table = 'hora_reservada'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'fecha_hora',
    ];

    // Resto de tu modelo, como relaciones, atributos, etc., si es necesario
}
