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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('/product/create', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('/product/show/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::get('/product/showApp/{product}', [App\Http\Controllers\ProductController::class, 'showApp'])->name('product.showApp');


Route::get('/service/create/{product}', [\App\Http\Controllers\ServiceController::class, 'create'])->name('service.create');
Route::post('/service/create', [\App\Http\Controllers\ServiceController::class, 'store'])->name('service.store');
Route::get('/service/edit/{service}', [\App\Http\Controllers\ServiceController::class, 'edit'])->name('service.edit');
Route::get('/service/destroy/{service}', [\App\Http\Controllers\ServiceController::class, 'destroy'])->name('service.destroy');
Route::patch('/service/update/{service}', [\App\Http\Controllers\ServiceController::class, 'update'])->name('service.update');

Route::get('/brands', [\App\Http\Controllers\HomeController::class, 'showAllBrands'])->name('home.brand');
Route::get('/brands/{product}', [\App\Http\Controllers\HomeController::class, 'show'])->name('home.show');
Route::get('/brands/type/{type}', [\App\Http\Controllers\HomeController::class, 'showByType'])->name('home.showByType');
Route::get('/brands/gender/{gender}', [\App\Http\Controllers\HomeController::class, 'showByGender'])->name('home.showByGender');

Route::get('/appointment/{product}', [App\Http\Controllers\AppointmentController::class, 'create'])->name('appointment.create');
Route::post('/appointment/store', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');
Route::get('/appointment', [App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment.index');
