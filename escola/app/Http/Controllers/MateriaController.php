<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $user = Auth::user();

        // Si el usuario es un profesor, obtener las materias asociadas a su id
        if ($user->is_professor) {
            $materies = Materia::where('professor_id', $user->id)->get();
        } else {
            // Si no es profesor, devolver una colección vacía
            $materies = collect();
        }

        // Pasar las materias a la vista
        return view('dashboard', compact('materies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materies = Materia::where('professor_id', Auth::id())->get();
        
        return view('materies.create', compact('materies'));
    }
    
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'day' => 'required|string|max:20',
            'hour' => 'required|string|max:10',
        ]);

        // Crear la nueva materia
        $materia = new Materia();
        $materia->name = $validated['name'];
        $materia->grade = $validated['grade'];
        $materia->day = $validated['day'];
        $materia->hour = $validated['hour'];
        $materia->professor_id = Auth::id(); 
        $materia->save();

        return redirect()->route('dashboard')->with('success', 'Matèria creada exitosament');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia)
    {
        // Verificar que el profesor autenticado sea el propietario de la materia
        if ($materia->professor_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'No tens permis para editar aquesta matèria');
        }

        return view('materies.edit', compact('materia'));
    }

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, Materia $materia)
{
    if ($materia->professor_id !== Auth::id()) {
        return redirect()->route('dashboard')->with('error', 'No tens permis para actualizar aquesta matèria');
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'day' => 'required|string|max:20',
        'hour' => 'required|string|max:10',
    ]);

    $materia->name = $validated['name'];
    $materia->day = $validated['day'];
    $materia->hour = $validated['hour'];
    $materia->save();

    return redirect()->route('dashboard')->with('success', 'Matèria actualizada exitosament');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $materia = Materia::findOrFail($id);

        if ($materia->professor_id === Auth::id()) {
            $materia->delete();

            return redirect()->route('dashboard')->with('success', 'Matèria eliminada exitosament');
        }

        return redirect()->route('dashboard')->with('error', 'No tens permis per a eliminar aquesta matèria');
    }
}
