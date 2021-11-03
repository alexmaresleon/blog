<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //  Relacion uno a muchos inversa con Usuarios
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //  Relacion uno a muchos inversa con Category
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    // Relacion uno a uno polimorfica con imagen
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
