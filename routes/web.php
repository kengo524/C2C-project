<?php

use Illuminate\Support\Facades\Route;

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

//新規出品登録
Route::prefix('item')->group(function (){
    Route::get('/create', 'App\Http\Controllers\ItemController@showCreateForm')->name('item.create'); //フォーム取得
    Route::post('/confirm', 'App\Http\Controllers\ItemController@confirm')->name('item.confirm'); //確認画面取得
    Route::post('/create', 'App\Http\Controllers\ItemController@create'); //保存処理実行
    Route::post('/complete', 'App\Http\Controllers\ItemController@complete'); //保存処理完了画面
    Route::get('/edit', 'App\Http\Controllers\ItemController@edit')->name('item.edit');
    Route::get('/delete', 'App\Http\Controllers\ItemController@edit')->name('item.delete');
});
