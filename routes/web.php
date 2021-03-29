<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products;
use App\Http\Controllers\Categories;
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


//Categories

Route::resource('/category', Categories::class);
Route::get('/trash/category', [Categories::class, 'trash'])->name('category.trash');
Route::patch('/category/restore/{id}', [Categories::class, 'restore'])->name('category.restore');


//Products

Route::resource('/product', Products::class);
Route::get('/trash/product', [Products::class, 'trash'])->name('product.trash');
Route::patch('/product/restore/{id}', [Products::class, 'restore'])->name('product.restore');


//Tags

Route::resource('/tag', TagController::class);
Route::get('/trash/tag', [TagController::class, 'trash'])->name('tag.trash');
Route::patch('/tag/restore/{id}', [TagController::class, 'restore'])->name('tag.restore');
