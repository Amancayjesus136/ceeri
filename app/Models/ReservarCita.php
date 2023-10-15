<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservarCita extends Model
{
    use HasFactory;
    protected $table = 'reservar_cita';

    protected $fillable = [
        'titulo_reservar',
        'descripcion_reservar'
    ] ;
}
