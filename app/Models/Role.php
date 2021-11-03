<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Relacion muchos a muchos con usuarios
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    // Relacion muchos a muchos con permisos
    public function permissions(){
        return $this->belongsToMany('App\Models\Permission');
    }
}
