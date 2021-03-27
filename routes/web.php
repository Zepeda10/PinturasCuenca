<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;

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
    return view('welcome');
});

Route::resource('admin/productos',ProductoController::class);

Route::resource('admin/proveedores',ProveedorController::class);

Route::resource('admin/categorias',CategoriaController::class);

Route::resource('admin/roles',RolController::class);

Route::resource('admin/usuarios',UsuarioController::class);

Route::get('/search', 'App\Http\Controllers\UsuarioController@search')->name('usuarios.search');
