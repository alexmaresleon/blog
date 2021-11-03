<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Relacion muchos a muchos -Inversa Polimorfica- con Posts
    public function posts(){
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }

    // Relacion muchos a muchos -Inversa Polimorfica- con Videos
    public function videos(){
        return $this->morphedByMany('App\Models\Video', 'taggable');
    }
}
