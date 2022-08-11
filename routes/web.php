<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\LikesController;
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

Route::get('/', 'App\Http\Controllers\InicioController@index')->name('inicio.index');

// Route::middleware('auth')->group(function(){

// RUTAS PARA RECETAS
// forma 1 de crear rutas
// Route::get('/recetas', [RecetaController::class, 'index'])->name('recetas.index');
// Route::get('/recetas/create', [RecetaController::class, 'create'])->name('recetas.create');
// Route::post('/recetas', [RecetaController::class, 'store'])->name('recetas.store');
// Route::get('/recetas/{receta}', [RecetaController::class, 'show'])->name('recetas.show');
// Route::get('recetas/{receta}/edit',  [RecetaController::class, 'edit'])->name('recetas.edit');
// Route::put('recetas/{receta}', [RecetaController::class, 'update'])->name('recetas.update');
// Route::delete('/recetas/{receta}', [RecetaController::class, 'destroy'])->name('recetas.destroy');

// RUTA PARA EL NAV DE CATEGORIAS
Route::get('/categoria/{categoriaReceta}', 'App\Http\Controllers\CategoriasController@show')->name('categorias.show');

// RUTA PARA EL BUSCADOR DE RECETAS
Route::get('/buscar', [RecetaController::class, 'search'])->name('buscar.show');

// todas las rutas de arriba, se pueden simplificar con la siguiente linea de codigo
Route::resource('recetas', 'App\Http\Controllers\RecetaController');

// RUTAS PARA PERFILES/USUARIOS
// forma 2 de crear rutas
Route::get('/perfiles/{perfil}', 'App\Http\Controllers\PerfilController@show')->name('perfiles.show');
Route::get('perfiles/{perfil}/edit', 'App\Http\Controllers\PerfilController@edit')->name('perfiles.edit');
Route::put('perfiles/{perfil}', 'App\Http\Controllers\PerfilController@update')->name('perfiles.update');

// RUTA PARA LIKES
Route::post('/recetas/{receta}', 'App\Http\Controllers\LikesController@update')->name('likes.update');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
