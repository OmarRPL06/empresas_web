<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresasController;

Route::get('/mapa', function () {
    return view('empresas.mapa');
});

Route::get('/', [EmpresasController::class, 'index'])->name('registrar.empresa');
Route::post('/registrar/empresa/', [EmpresasController::class, 'store'])->name('registrar.empresa');
Route::get('/mapa/{idEmpresa}', [EmpresasController::class, 'show'])->name('mapa.empresa');
