<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/activate/{code}', [App\Http\Controllers\ActivationController::class, 'activateUserAccount'])->name('user.activate');
Route::get('/activate/{email}', [App\Http\Controllers\ActivationController::class, 'resendActivationController'])->name('code.resend');
Route::resource('products', App\Http\Controllers\ProductController::class); 
Route::get('products/category/{category}', [App\Http\Controllers\HomeController::class, 'showProductByCategory'])->name('category.products');
