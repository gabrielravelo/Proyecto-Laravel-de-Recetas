<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // evento que se ejecuta cuando un usuario es creado
    protected static function boot()
    {
        parent::boot();

        // asignar perfil una vez se haya creado un usuario nuevo
        static::created(function ($user) {
            $user->perfil()->create();
        });
    }

    /** Relacion 1:n de Usuario a Recetas **/
    public function recetas() 
    {
        
        return $this->hasMany(Receta::class);
    }

    /** Relacion 1:1 de Usuario a Perfils **/
    public function perfil() 
    {
        return $this->hasOne(Perfil::class);
    }

     // recetas que el usuario le ha dado like
    public function meGusta()
    {
        return $this->belongsToMany(Receta::class, 'likes_receta');
    }
}
