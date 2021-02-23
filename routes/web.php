<?php

use App\Http\Controllers\{
    PacienteController
};
use Illuminate\Support\Facades\Route;

Route::any('/pacients/search', [PacienteController::class, 'search'])->name('pacients.search');
Route::post('/pacients', [PacienteController::class, 'store'])->name('pacients.store');

Route::get('/pacients', [PacienteController::class, 'index'])->name('pacients.index');
Route::get('/pacients/create', [PacienteController::class, 'create'])->name('pacients.create');
Route::get('/pacients/edit/{id}', [PacienteController::class, 'edit'])->name('pacients.edit');
Route::put('/pacients/{id}', [PacienteController::class, 'update'])->name('pacients.update');
Route::get('/pacients/{id}', [PacienteController::class, 'show'])->name('pacients.show');

Route::delete('/pacients/{id}', [PacienteController::class, 'destroy'])->name('pacients.destroy');


Route::get('/', function () {
    return view('welcome');
});
