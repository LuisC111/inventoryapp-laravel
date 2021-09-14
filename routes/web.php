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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\InvoiceController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');



Route::get('/products', [ProductController::class, 'show']);
Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('prodDelete');
Route::get('product/form/{id?}', [ProductController::class, 'form'])->name('product.form');
Route::post('/product/save',[ProductController::class,'save'])->name('product.save');

Route::get('/brands', [BrandController::class, 'show']);
Route::get('brand/delete/{id}', [BrandController::class, 'delete'])->name('brandDelete');
Route::get('brand/form/{id?}', [BrandController::class, 'form'])->name('brand.form');
Route::post('/brand/save',[BrandController::class,'save'])->name('brand.save');

Route::get('/categories', [CategoriesController::class, 'show']);
Route::get('categories/delete/{id}', [CategoriesController::class, 'delete'])->name('categoriesDelete');
Route::get('categories/form/{id?}', [CategoriesController::class, 'form'])->name('categories.form');
Route::post('/categories/save',[CategoriesController::class,'save'])->name('categories.save');

Route::get('/invoices', [InvoiceController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
