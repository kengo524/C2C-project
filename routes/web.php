<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterEditController;
use App\Http\Controllers\RegisterUsersEditController;
use App\Http\Controllers\RegisterBankEditController;
use App\Http\Controllers\RegisterShippingAddressEditController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;



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


//ユーザのルート
Route::get('/mypage', [UserController::class, 'mypage'])->middleware(['auth'])->name('mypage');

//ユーザ情報変更系のルート
Route::get('/register/edit/{id}', [RegisterEditController::class, 'index'])->middleware(['auth'])->name('register.edit');
//基本情報変更
Route::get('/register/users/edit/{id}', [RegisterUsersEditController::class, 'show'])->middleware(['auth'])->name('register.users.edit');
Route::post('/register/users/edited/{id}', [RegisterUsersEditController::class, 'edit'])->middleware(['auth'])->name('register.users.edited');
//口座情報変更
Route::get('/register/bank/edit/{id}', [RegisterBankEditController::class, 'show'])->middleware(['auth'])->name('register.bank.edit');
Route::post('/register/bank/edited/{id}', [RegisterBankEditController::class, 'edit'])->middleware(['auth'])->name('register.bank.edited');
//お届け先情報変更
Route::get('/register/shippingaddress/edit/{id}', [RegisterShippingAddressEditController::class, 'show'])->middleware(['auth'])->name('register.shippingaddress.edit');
Route::post('/register/shippingaddress/edited/{id}', [RegisterShippingAddressEditController::class, 'edit'])->middleware(['auth'])->name('register.shippingaddress.edited');

//購入系のルート
Route::get('/orders', [OrderController::class, 'index'])->middleware(['auth'])->name('orders');
Route::get('/orders/{id}', [OrderController::class, 'show'])->middleware(['auth'])->name('order');

