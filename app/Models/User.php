<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}

class UserData extends Model
{
    use HasFactory;

    protected $table = 'datos_usuarios';

    protected $fillable = [
        'dni',
        'codigo_trabajador',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'sexo',
        'fecha_nacimiento',
        'edad',
        'estado_civil',
        'nacionalidad',
        'otra_nacionalidad',
        'procedencia',
        'condicion_laboral',
        'region_laboral',
        'cargo',
        'unidad',
        'oficina',
        'correo_corporativo',
        'correo_personal',
        'profesiones',
        'fecha_ingreso',
        'fecha_cese',
    ];
}

// class Evento extends Model
// {
//     use HasFactory;

//     protected $table = 'datos_usuarios';

//     public function eventos(): BelongsTo
//         {
//             return $this->belongsTo('App\Evento');
//         }
// }



