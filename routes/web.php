<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\LectorController;
use App\Http\Controllers\PrestamoController;

Route::get('/', function () {
    return view('menu');
});




Route::resource('libros', LibroController::class);
Route::resource('lectors', LectorController::class);
Route::resource('prestamos', PrestamoController::class);

