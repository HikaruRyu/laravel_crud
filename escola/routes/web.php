<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller; 
use App\Http\Controllers\MateriaController;
use Illuminate\Support\Facades\Route;
use App\Models\Materia;
use App\Http\Controllers\AlumneController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;


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
    Route::get('/alumnes/alumne', [AlumneController::class, 'index'])->name('alumne.alumnes');
});

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
Route::post('/admin/users/{user}/assign-professor', [UserController::class, 'assignProfessor'])->name('admin.users.assign-professor');
Route::get('/admin/users/{user}/add', [UserController::class, 'showAddAlumneForm'])->name('admin.users.add.show');
Route::post('/admin/users/{user}/add', [UserController::class, 'storeAlumne'])->name('admin.users.add');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
