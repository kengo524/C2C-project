<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterEditController;
use App\Http\Controllers\RegisterUsersEditController;
use App\Http\Controllers\RegisterBankEditController;
use App\Http\Controllers\RegisterShippingAddressEditController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingSoldController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;


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
//口座情報変更＋登録
Route::get('/register/bank/edit/{id}', [RegisterBankEditController::class, 'show'])->middleware(['auth'])->name('register.bank.edit');
Route::post('/register/bank/edited/{id}', [RegisterBankEditController::class, 'edit'])->middleware(['auth'])->name('register.bank.edited');
Route::get('/register/bank/new', [RegisterBankEditController::class, 'show'])->middleware(['auth'])->name('register.bank.new');
Route::post('/register/bank/create', [RegisterBankEditController::class, 'create'])->middleware(['auth'])->name('register.bank.create');
//お届け先情報変更＋登録
Route::get('/register/shippingaddress/edit/{id}', [RegisterShippingAddressEditController::class, 'show'])->middleware(['auth'])->name('register.shippingaddress.edit');
Route::post('/register/shippingaddress/edited/{id}', [RegisterShippingAddressEditController::class, 'edit'])->middleware(['auth'])->name('register.shippingaddress.edited');
Route::get('/register/shippingaddress/new', [RegisterShippingAddressEditController::class, 'show'])->middleware(['auth'])->name('register.shippingaddress.new');
Route::post('/register/shippingaddress/create', [RegisterShippingAddressEditController::class, 'create'])->middleware(['auth'])->name('register.shippingaddress.create');

//購入系のルート
Route::get('/orders', [OrderController::class, 'index'])->middleware(['auth'])->name('orders');
Route::get('/orders/{id}', [OrderController::class, 'show'])->middleware(['auth'])->name('order');
Route::post('/orders/create', [OrderController::class, 'create'])->name('orders.create');

//カート処理のルート
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'cartlist'])->middleware(['auth'])->name('cart.cartlist');
Route::get('/cart/shippinginfo', [CartController::class, 'shippinginfo'])->name('cart.shippinginfo');
Route::get('/cart/paymentinfo', [CartController::class, 'paymentinfo'])->name('cart.paymentinfo');
Route::post('/cart/confirm', [CartController::class, 'confirm'])->name('cart.confirm');
Route::get('/cart/complete', [CartController::class, 'complete'])->name('cart.complete');
//注文確定時、在庫以上の購入ができないエラー表示
Route::get('/cart/quantity_error', [CartController::class, 'quantity_error'])->name('cart.quantity_error');
//カート追加時、在庫以上の追加が出来ないエラー表示
Route::get('/cart/add_error', [CartController::class, 'add_error'])->name('cart.add_error');
Route::post('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');

//出品履歴
Route::get('/listing', [ListingController::class, 'index'])->middleware(['auth'])->name('listing'); //履歴一覧
Route::get('/listing/{id}', [ListingController::class, 'show'])->middleware(['auth'])->name('list'); //履歴詳細
Route::get('/listing/edit/{id}', [ListingController::class, 'edit'])->middleware(['auth'])->name('list.edit'); //履歴編集
Route::post('/listing/edited/{id}', [ListingController::class, 'edited'])->middleware(['auth'])->name('list.edited'); //履歴編集実行
// Route::get('/listing/delete/{id}', [ListingController::class, 'delete'])->middleware(['auth'])->name('list.delete'); //履歴削除確認
// Route::post('/listing/deleted/{id}', [ListingController::class, 'deleted'])->middleware(['auth'])->name('list.deleted');

//成約済み商品
Route::get('/listing-sold', [ListingSoldController::class, 'index'])->middleware(['auth'])->name('listing-sold.index'); //成約済み一覧
Route::get('/listing-sold/{id}', [ListingSoldController::class, 'show'])->middleware(['auth'])->name('listing-sold.show'); //成約済み詳細
Route::get('/listing-sold/edit/{order_detail_id}', [ListingSoldController::class, 'edit'])->middleware(['auth'])->name('listing-sold.edit'); //商品状態編集
Route::post('/listing-sold/complete/{order_detail_id}', [ListingSoldController::class, 'complete'])->middleware(['auth'])->name('listing-sold.complete'); //商品状態編集実行
