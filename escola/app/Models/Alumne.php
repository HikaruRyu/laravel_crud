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
        return Materia::where('grade', $this->grade)->get();
    }    
}
