<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $materies = Materia::all();
        return view('dashboard', compact('materies'));
    }
}