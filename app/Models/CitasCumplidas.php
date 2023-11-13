<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitasCumplidas extends Model
{
    use HasFactory;
    protected $table = 'citas_cumplidas'; 
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

}
