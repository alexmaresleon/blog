<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    //  Relacion uno a muchos -inversa- con Usuarios
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Relacion uno a muchos polimorfica
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    // Relacion muchos a muchos polimorfica con etiquetas
    public function tags(){
        return $this->morphToMany('App\Models\Tag', 'taggables');
    }
}
