<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumne extends Model
{
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function materies()
    {
        return $this->belongsToMany(Materia::class, 'alumne_materia');
    }
}
