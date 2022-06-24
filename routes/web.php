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

//login logout & register routes 
Auth::routes();
//home route 
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//activate user account routes
Route::get('/activate/{code}', [App\Http\Controllers\ActivationController::class, 'activateUserAccount'])->name('user.activate');
Route::get('/resend/{email}', [App\Http\Controllers\ActivationController::class, 'resendActivationCode'])->name('code.resend');
//products routes
Route::resource('products', App\Http\Controllers\ProductController::class); 
Route::get('products/category/{category}', [App\Http\Controllers\HomeController::class, 'showProductByCategory'])->name('category.products');
//cart Routes
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/add/cart/{product}', [App\Http\Controllers\CartController::class, 'addProductToCart'])->name('add.cart');
Route::delete('/remove/{product}/cart', [App\Http\Controllers\CartController::class, 'removeProductFromCart'])->name('remove.cart');
Route::put('/update/{product}/cart', [App\Http\Controllers\CartController::class, 'updateProductOnCart'])->name('update.cart');
 