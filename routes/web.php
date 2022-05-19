<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
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

//購入系のルート
Route::get('/orders', [OrderController::class, 'index'])->middleware(['auth'])->name('orders');
Route::get('/orders/{id}', [OrderController::class, 'show'])->middleware(['auth'])->name('order');

