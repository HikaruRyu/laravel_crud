<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('alumne')->get();
        return view('admin.users', compact('users'));
    }

    public function assignProfessor(User $user)
{
    if ($user->is_professor) {
        return redirect()->route('admin.users')->with('success', 'Aquest usuari ja és professor.');
    }

    if ($user->alumne) {
        return redirect()->route('admin.users')->with('success', 'No es pot assignar un alumne com professor.');
    }

    $user->is_professor = true;
    $user->save();

    return redirect()->route('admin.users')->with('success', 'Usuari assignat com a professor.');
}

public function showAddAlumneForm(User $user)
{
    if ($user->alumne) {
        return redirect()->route('admin.users')->with('success', 'Aquest usuari ja és alumne.');
    }

    if ($user->is_professor) {
        return redirect()->route('admin.users')->with('success', 'No es pot afegir un professor com alumne.');
    }

    return view('admin.add-alumne', compact('user'));
}
    public function edit(User $user)
    {
        return view('admin.add', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'is_professor' => 'boolean',
        ]);

        $user->update($request->only('name', 'email', 'is_professor'));

        return redirect()->route('admin.users')->with('success', 'Usuario actualizado');
    }

    public function storeAlumne(Request $request, User $user)
    {
        if ($user->alumne) {
            return redirect()->route('admin.users')->with('success', 'Aquest usuari ja és alumne.');
        }

        if ($user->is_professor) {
            return redirect()->route('admin.users')->with('success', 'No es pot afegir un professor com alumne.');
        }

        $request->validate([
            'grade' => 'required|in:1ESO,2ESO,3ESO,4ESO,1BATX,2BATX',
        ]);

        $user->alumne()->create([
            'name' => $user->name,
            'surname' => '',
            'dateOfBirth' => null,
            'grade' => $request->grade,
            'year' => now()->year,
        ]);

        return redirect()->route('admin.users')->with('success', 'Alumne afegit correctament.');
    }
}
