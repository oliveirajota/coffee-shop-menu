<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'listProducts'])->name('products');
Route::get('/products/new', [App\Http\Controllers\ProductController::class, 'newProduct'])->name('products');
Route::post('/products/save', [App\Http\Controllers\ProductController::class, 'saveNewProduct'])->name('products');
Route::get('/products/id/{id}', [App\Http\Controllers\ProductController::class, 'editProduct'])->name('products');
Route::post('/products/update', [App\Http\Controllers\ProductController::class, 'saveProduct'])->name('products');


Route::get('/groups', [App\Http\Controllers\ProductTypeController::class, 'listProductTypes'])->name('groups');
Route::get('/groups/new', [App\Http\Controllers\ProductTypeController::class, 'newProductType'])->name('groups');
Route::post('/groups/save', [App\Http\Controllers\ProductTypeController::class, 'saveNewProductType'])->name('groups');
Route::get('/groups/id/{id}', [App\Http\Controllers\ProductTypeController::class, 'editProductType'])->name('groups');
Route::post('/groups/update', [App\Http\Controllers\ProductTypeController::class, 'saveProductType'])->name('groups');
