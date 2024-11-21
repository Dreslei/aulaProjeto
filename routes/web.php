<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DistribuidoraController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\JogoController;

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('distribuidoras', DistribuidoraController::class);

Route::resource('generos', GeneroController::class);

Route::resource('plataformas', PlataformaController::class);

Route::resource('jogos', JogoController::class);

Route::resource('usuarios', UserController::class);


// GET
// POST
// PUT
// DELETE

require __DIR__.'/auth.php';
