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
Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('page.first');
Route::get('/explore', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
 //payment Routes
 Route::get('/handle-payment', [App\Http\Controllers\PaypalPaymentController::class, 'handlePayment'])->name('make.payment');
 Route::get('/cancel-payment', [App\Http\Controllers\PaypalPaymentController::class, 'paymentCancel'])->name('cancel.payment');
 Route::get('/cancel-success', [App\Http\Controllers\PaypalPaymentController::class, 'paymentSuccess'])->name('success.payment');
//admin routes
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\AdminController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/logout', [App\Http\Controllers\AdminController::class, 'adminLogout'])->name('admin.logout');
Route::get('/admin/products', [App\Http\Controllers\AdminController::class, 'getProducts'])->name('admin.products');
Route::get('/admin/orders', [App\Http\Controllers\AdminController::class, 'getOrders'])->name('admin.orders');

//orders routes
Route::resource('orders', App\Http\Controllers\OrderController::class);