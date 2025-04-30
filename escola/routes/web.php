<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;  // Asegúrate de usar tu controlador adecuado
use App\Http\Controllers\MateriaController;
use Illuminate\Support\Facades\Route;
use App\Models\Materia;
use App\Http\Controllers\AlumneController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [Controller::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('materies', MateriaController::class)->parameters([
    'materies' => 'materia'  
]);


Route::middleware(['auth'])->group(function () {
    Route::get('/materies/alumne', function () {
        if (Auth::user()->is_professor) {
            abort(403, 'Accés no autoritzat.');
        }

        return app(App\Http\Controllers\AlumneController::class)->index();
    })->name('alumne.materies');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
