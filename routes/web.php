<?php

use App\Http\Controllers\{
    DiagnosticController,
    PacienteController
};
use Illuminate\Support\Facades\Route;

Route::any('/pacients/search', [PacienteController::class, 'search'])->name('pacients.search');
Route::post('/pacients', [PacienteController::class, 'store'])->name('pacients.store');
Route::get('/pacients', [PacienteController::class, 'index'])->name('pacients.index');
Route::get('/pacients/edit/{id}', [PacienteController::class, 'edit'])->name('pacients.edit');
Route::get('/pacients/{id}', [PacienteController::class, 'show'])->name('pacients.show');
Route::put('/pacients/{id}', [PacienteController::class, 'update'])->name('pacients.update');
Route::delete('/pacients/{id}', [PacienteController::class, 'destroy'])->name('pacients.destroy');

Route::post('/diagnostic/{id}', [DiagnosticController::class, 'store'])->name('diagnostic.store');
Route::get('/diagnostic/{id}', [PacienteController::class, 'createDiagnostic'])->name('diagnostic.create');


Route::get('/', function () {
    return view('welcome');
});
