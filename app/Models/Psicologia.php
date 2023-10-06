<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psicologia extends Model
{
    use HasFactory;
    
    protected $table = 'psicologia'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'nombres',
        'apellidos',
        'telefono',
        'especialidad',
        'genero',
        'fecha_hora',
        'estado',
    ];

    // Puedes agregar relaciones aquí si es necesario
}
