<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterEditController;
use App\Http\Controllers\RegisterUsersEditController;
use App\Http\Controllers\RegisterBankEditController;
use App\Http\Controllers\RegisterShippingAddressEditController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;


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

// ホーム画面
Route::get('/', [HomeController::class, 'index'])->name('homepage');
// 商品
// Route::get('/item', [HomeController::class, 'index'])->name('homepage');
// Route::get('/item/{id}', [ItemController::class, 'itemDetail'])->name('item_detail');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//新規出品登録
Route::prefix('item')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('homepage');
    Route::get('/create', [ItemController::class, 'showCreateForm'])->name('item.create'); //フォーム取得
    Route::post('/confirm', [ItemController::class, 'confirm'])->name('item.confirm'); //確認画面取得
    Route::post('/create', [ItemController::class, 'create']); //保存処理実行
    Route::get('/complete', [ItemController::class, 'complete'])->name('item.complete'); //保存処理完了画面
    Route::get('/delete', [ItemController::class, 'edit'])->name('item.edit');
    Route::get('/delete', [ItemController::class, 'delete'])->name('item.delete');
    Route::get('/{id}', [ItemController::class, 'itemDetail'])->name('item_detail');
});

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

//出品履歴
Route::get('/listing', [ListingController::class, 'index'])->middleware(['auth'])->name('listing'); //履歴一覧
Route::get('/listing/{id}', [ListingController::class, 'show'])->middleware(['auth'])->name('list'); //履歴詳細
Route::get('/listing/edit/{id}', [ListingController::class, 'edit'])->middleware(['auth'])->name('list.edit'); //履歴編集
Route::post('/listing/edited/{id}', [ListingController::class, 'edited'])->middleware(['auth'])->name('list.edited'); //履歴編集実行
// Route::get('/listing/delete/{id}', [ListingController::class, 'delete'])->middleware(['auth'])->name('list.delete'); //履歴削除確認
// Route::post('/listing/deleted/{id}', [ListingController::class, 'deleted'])->middleware(['auth'])->name('list.deleted');
