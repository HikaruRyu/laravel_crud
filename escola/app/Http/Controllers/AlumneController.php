<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Support\Facades\Auth;
use App\Models\Alumne;
use Illuminate\Http\Request;

class AlumneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function index()
     {
         if (Auth::user()->is_professor) {
             abort(403, 'Accés no autoritzat, només per a alumnes.');
         }
     
         $alumne = Auth::user()->alumne;
         $materies = Materia::where('grade', $alumne->grade)->get();
         
         return view('alumnes.alumne', compact('materies'));
     }
     
     
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumne $alumne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumne $alumne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumne $alumne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumne $alumne)
    {
        //
    }
}
