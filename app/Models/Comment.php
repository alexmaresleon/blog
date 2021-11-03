<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Relacion uno a muchos -Inversa- con Usuarios
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Le decimos que estamos usando tabla polimorfica de 1 a muchos
    public function commentable(){
        return $this->morphTo();
    }
}
