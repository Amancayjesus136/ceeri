<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConocemeMas extends Model
{
    use HasFactory;
    protected $table = 'conoceme_mas';
	protected $primaryKey = 'id_conocenos';

    protected $fillable = [
        'titulo_conocenos',
        'descripcion_conocenos',
        'descripcion2_conocenos',
        'sub1',
        'sub2',
        'sub3',
        'sub4',
    ] ;
}
