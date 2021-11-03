<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // Para permitir asignacion masiva
    protected $guarded = [];

    use HasFactory;

    // Relacion uno a uno polimorfica
    public function imageable(){
        return $this->morphTo();
    }
}
