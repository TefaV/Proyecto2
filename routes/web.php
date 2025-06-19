<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\VideojuegoController;

// Ruta principal
Route::get('/', function () {
    return redirect()->route('categorias.index');
});

// Rutas de Categorías
Route::resource('categorias', CategoriaController::class);

// Rutas de Videojuegos
Route::resource('videojuegos', VideojuegoController::class);
