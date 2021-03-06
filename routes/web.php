<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products;
use App\Http\Controllers\Categories;

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

Route::get('/', function() {
    return view('welcome');
});


//Products
Route::get('/product', [Products::class, 'index'])->name('product.index');
Route::get('/product/create', [Products::class, 'create'])->name('product.create');
Route::post('/product/store', [Products::class, 'store'])->name('product.store');
Route::get('/product/edit/{product}', [Products::class, 'edit'])->name('product.edit');
Route::post('/product/update/{product}', [Products::class, 'update'])->name('product.update');
Route::get('/product/destroy/{product}', [Products::class, 'destroy'])->name('product.destroy');

//Categories
Route::get('/category', [Categories::class, 'index'])->name('category.index');
Route::get('/category/create', [Categories::class, 'create'])->name('category.create');
Route::post('/category/store', [Categories::class, 'store'])->name('category.store');
Route::get('/category/edit/{category}', [Categories::class, 'edit'])->name('category.edit');
Route::post('/category/update/{category}', [Categories::class, 'update'])->name('category.update');
Route::get('/category/destroy/{category}', [Categories::class, 'destroy'])->name('category.destroy');
