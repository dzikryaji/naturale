<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
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

Route::get('/product/{product}', [ProductController::class, 'show']);

Route::post('/address', [CheckoutController::class, 'address']);

Route::post('/payment', [CheckoutController::class, 'payment']);

Route::post('/checkout', [CheckoutController::class, 'checkout']);

Route::get('/address', [CheckoutController::class, 'redirect']);

Route::get('/payment', [CheckoutController::class, 'redirect']);

Route::get('/checkout', [CheckoutController::class, 'redirect']);
