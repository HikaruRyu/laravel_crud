<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materies'; 

    public function alumnes()
    {
        return $this->belongsToMany(Alumne::class, 'alumne_materia');
    }

}

