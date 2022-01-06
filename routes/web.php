<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\ProductoCategoriaController;
use App\Http\Controllers\Admin\OrdenController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuCategoriaController;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [OrdenController::class, 'home'])->name('dashboard');

Route::get('admin/producto/', [ProductoController::class, 'index'])->name('index_producto');
Route::get('admin/producto/create', [ProductoController::class, 'create'])->name('create_producto');
Route::get('admin/producto/edit/{id}', [ProductoController::class, 'edit'])->name('edit_producto');
Route::post('admin/producto/store', [ProductoController::class, 'store'])->name('store_producto');
Route::post('admin/producto/update/{id}', [ProductoController::class, 'update'])->name('update_producto');
Route::delete('admin/producto/destroy/{id}', [ProductoController::class, 'destroy'])->name('destroy_producto');

Route::get('admin/categoria/', [ProductoCategoriaController::class, 'index'])->name('index_categoria');
Route::post('admin/categoria/store', [ProductoCategoriaController::class, 'store'])->name('store_categoria');
Route::post('admin/categoria/update/{id}', [ProductoCategoriaController::class, 'update'])->name('update_categoria');
Route::delete('admin/categoria/destroy/{id}', [ProductoCategoriaController::class, 'destroy'])->name('destroy_categoria');

Route::get('admin/orden/', [OrdenController::class, 'index'])->name('index_orden');
Route::get('admin/ordenDetalle/{id}', [OrdenController::class, 'orden_Detalle'])->name('orden_Detalle');
Route::post('admin/orden/updateEstado/{id}', [OrdenController::class, 'update_estado'])->name('update_estado');

Route::get('admin/menu/', [MenuController::class, 'index'])->name('index_menu');
Route::post('admin/menu/store', [MenuController::class, 'store'])->name('store_menu');
Route::post('admin/menu/update/{id}', [MenuController::class, 'update'])->name('update_menu');
Route::delete('admin/menu/destroy/{id}', [MenuController::class, 'destroy'])->name('destroy_menu');

Route::get('admin/menuCategoria/', [MenuCategoriaController::class, 'index'])->name('index_menu_categoria');
Route::post('admin/menuCategoria/store', [MenuCategoriaController::class, 'store'])->name('store_menu_categoria');
Route::post('admin/menuCategoria/update/{id}', [MenuCategoriaController::class, 'update'])->name('update_menu_categoria');
Route::delete('admin/menuCategoria/destroy/{id}', [MenuCategoriaController::class, 'destroy'])->name('destroy_menu_categoria');
