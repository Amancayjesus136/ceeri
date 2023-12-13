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

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'descripcion',
        'telefono',
        'foto',
        'cumpleanos',
        'facebook',
        'instagram',
        'wsp',
        'twitter',
        'created_at'

    ];
    public function profile()
    {
        return $this->hasOne(profile::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

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



