<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index']);

Route::get('/home', [ProductController::class, 'index']);

Route::get('/product/{product}', [ProductController::class, 'show']);

Route::post('/address', [CheckoutController::class, 'storeQuantity'])->middleware('auth');
Route::post('/payment', [CheckoutController::class, 'storeAddress'])->middleware('auth');
Route::post('/checkout', [CheckoutController::class, 'checkout'])->middleware('auth');

Route::get('/address', [CheckoutController::class, 'showAddressForm'])->middleware('auth');
Route::get('/payment', [CheckoutController::class, 'showPaymentForm'])->middleware('auth');
Route::get('/checkout', fn() => redirect('/'))->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/logout', fn() => redirect('/'));

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);