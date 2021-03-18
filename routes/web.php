<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products as ProductController;
use App\Http\Controllers\Categories as CategoryController;
use App\Http\Controllers\TagController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Products

Route::resource('/product', ProductController::class);

/*
    Route::get('/product', [Products::class, 'index'])->name('product.index');
    Route::get('/product/create', [Products::class, 'create'])->name('product.create');
    Route::post('/product/store', [Products::class, 'store'])->name('product.store');
    Route::get('/product/edit/{product}', [Products::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{product}', [Products::class, 'update'])->name('product.update');
    Route::get('/product/destroy/{product}', [Products::class, 'destroy'])->name('product.destroy');
*/


//Categories

Route::resource('/category', CategoryController::class);

/*
    Route::get('/category', [Categories::class, 'index'])->name('category.index');
    Route::get('/category/create', [Categories::class, 'create'])->name('category.create');
    Route::post('/category/store', [Categories::class, 'store'])->name('category.store');
    Route::get('/category/edit/{category}', [Categories::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{category}', [Categories::class, 'update'])->name('category.update');
    Route::get('/category/destroy/{category}', [Categories::class, 'destroy'])->name('category.destroy');
*/


//Tags

Route::resource('/tag', TagController::class);

/*
    Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
    Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/tag/store', [TagController::class, 'store'])->name('tag.store');
    Route::get('/tag/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
    Route::post('/tag/update/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::get('/tag/destroy/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
*/
