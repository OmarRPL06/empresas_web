<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;

Route::get('/', function () {
    return view('clientes.index');
});

Route::post('/registrar/cliente/omar', [ClientesController::class, 'store'])->name('registrar.cliente');
