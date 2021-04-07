<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TemporalVentaController; 
 
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
    return redirect('/login');
});



Route::resource('admin/productos',ProductoController::class);

Route::resource('admin/proveedores',ProveedorController::class);

Route::resource('admin/categorias',CategoriaController::class);

Route::resource('admin/roles',RolController::class);

Route::resource('admin/usuarios',UsuarioController::class);

Route::get('/search', 'App\Http\Controllers\UsuarioController@search')->name('usuarios.search');

Route::get('/buscaProducto/{codigo}', 'App\Http\Controllers\ProductoController@buscarProducto')->name('productos.buscarCodigo'); 

Route::get('/ventaTemporal/{id}/{folio}/{cantidad}', 'App\Http\Controllers\TemporalVentaController@insertarTemporal')->name('temporal.ventaTemporal');

Route::get('/eliminaProducto/{id}/{folio}', 'App\Http\Controllers\TemporalVentaController@eliminarTemporal')->name('temporal.eliminaProducto');

Route::post('/guardaVenta', 'App\Http\Controllers\VentasController@guardar')->name('ventas.guardar');

Route::get('admin/', function () {
    return view('admin.welcome');
})->name('admin.welcome'); 



Auth::routes(["register" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('ventas/', function () {
    return view('ventas.index');
})->name('ventas.index'); 
