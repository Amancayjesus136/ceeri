<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CeeriImagen extends Model
{
    use HasFactory;
    protected $table = 'imagen';
	protected $primaryKey = 'id_imagen_ceeri';

    protected $fillable = [
        'imagen_data',
    ] ;
}
