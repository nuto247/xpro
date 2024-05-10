<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AllControllers;

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

Route::get('/', function () {
    return view('welcome');
});

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

Route::get('/dashboard', [App\Http\Controllers\AllController::class, 'dashboard'])->name('dashboard');
