<?php

use App\Http\Controllers\AffliateEarningsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AllControllers;
use App\Http\Controllers\OrderController;

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

});

Route::get('/logout', [App\Http\Controllers\AllController::class, 'logout'])->name('logout');

Route::get('/addproducts', [App\Http\Controllers\AllController::class, 'addproducts'])->name('addproducts');

Route::post('/addproduct', [App\Http\Controllers\AllController::class, 'addproduct'])->name('addproduct');

Route::get('/listproducts', [App\Http\Controllers\AllController::class, 'listproducts'])->name('listproducts');

Route::get('/editproducts/{id}', [App\Http\Controllers\AllController::class, 'editproducts'])->name('editproducts');

Route::get('/productdetail/{id}', [App\Http\Controllers\AllController::class, 'productdetail'])->name('productdetail');

Route::delete('/deleteproduct/{id}', [App\Http\Controllers\AllController::class, 'deleteproduct'])->name('deleteproduct');

Route::post('/productupdate', [App\Http\Controllers\AllController::class, 'productupdate'])->name('productupdate');

Route::get('/dashboard', [App\Http\Controllers\AllController::class, 'dashboard'])->name('dashboard');

Route::get('/', [App\Http\Controllers\AllController::class, 'welcome'])->name('welcome');

Route::get('/orders', [OrderController::class, 'list'])->name('order_list');

Route::get('/affliate-earnings', [AffliateEarningsController::class, 'list'])->name('affliate_earning_list');

// Laravel 8 & 9 PayStack Payment https://github.com/unicodeveloper/laravel-paystack

Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');

Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

Route::post('/paynow', [App\Http\Controllers\PaymentController::class, 'paynow'])->name('paynow')->middleware('auth');

Route::get('/redirectpay', [App\Http\Controllers\PaymentController::class, 'redirectpay'])->name('redirectpay')->middleware('auth');
