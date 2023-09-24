<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerapiaInfantil extends Model
{
    use HasFactory;
    protected $table = 'terapia_infantil'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'nombres',
        'apellidos',
        'telefono',
        'especialidad',
        'genero',
        'fecha_hora'
                    ] ;
}
