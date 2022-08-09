<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('recetas.index'));
});

// HACER LA RUTA EN LARAVEL 8


// Route::middleware('auth')->group(function(){

// RUTAS PARA RECETAS
// forma 1 de crear rutas
Route::get('/recetas', [RecetaController::class, 'index'])->name('recetas.index');
Route::get('/recetas/create', [RecetaController::class, 'create'])->name('recetas.create');
Route::post('/recetas', [RecetaController::class, 'store'])->name('recetas.store');
Route::get('/recetas/{receta}', [RecetaController::class, 'show'])->name('recetas.show');
Route::get('recetas/{receta}/edit',  [RecetaController::class, 'edit'])->name('recetas.edit');
Route::put('recetas/{receta}', [RecetaController::class, 'update'])->name('recetas.update');
Route::delete('/recetas/{receta}', [RecetaController::class, 'destroy'])->name('recetas.destroy');

// RUTAS PARA PERFILES/USUARIOS
// forma 2 de crear rutas
Route::get('/perfiles/{perfil}', 'App\Http\Controllers\PerfilController@show')->name('perfiles.show');
Route::get('perfiles/{perfil}/edit', 'App\Http\Controllers\PerfilController@edit')->name('perfiles.edit');
Route::put('perfiles/{perfil}', 'App\Http\Controllers\PerfilController@update')->name('perfiles.update');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
