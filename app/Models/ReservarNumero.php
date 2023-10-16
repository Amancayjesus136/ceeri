<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservarNumero extends Model
{
    use HasFactory;
    protected $table = 'numero_reservar';
	protected $primaryKey = 'id_numero';

    protected $fillable = [
        'numero',
        'titulo_numero',
        'descripcion_numero',
    ] ;
}
