<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
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
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // Relacion uno a uno con perfiles
    public function profile(){
        return $this->hasOne('App\Models\Profile');
    }

    // Relacion uno a muchos con publicaciones
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    // Relacion uno a muchos con comentarios
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    // Relacion uno a muchos con videos
    public function videos(){
        return $this->hasMany('App\Models\Video');
    }

    // Relacion muchos a muchos con Roles
    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }

    // Relacion uno a uno polimorfica con imagen
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
