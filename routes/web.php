<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\ProductosController::class, 'index'])->name('home');
Route::post('/productos', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store');

Route::get('/productos/{[producto]}', [App\Http\Controllers\ProductosController::class, 'show'])->name('productos.show');

Route::patch('/productos/{producto}/home', [App\Http\Controllers\ProductosController::class, 'update'])->name('productos.update');

Route::delete('/productos/{producto}', [App\Http\Controllers\ProductosController::class, 'destroy'])->name('productos.destroy');
