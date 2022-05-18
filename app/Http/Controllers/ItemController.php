<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateItem;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //新規出品フォームの表示
    public function showCreateForm()
    {
        // すべての商品カテゴリを取得する
        $item_categories = ItemCategory::all();

        return view('item/create', [
            'item_categories' => $item_categories,
        ]);
    }

    //新規出品確認画面
    public function confirm(CreateItem $request)
    {
        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();

        //入力内容確認ページのviewに変数を渡して表示
        return view('item.confirm', [
            'request' => $inputs,
            'login_user_id' => $login_user_id,
        ]);
    }

    //出品内容の保存
    public function create(Request $request)
    {
        // 現在ログインしているユーザー情報の取得
        $login_user = Auth::user();
        // 現在ログインしているユーザーのID取得
        $user_id = Auth::id();

        // フォルダモデルのインスタンスを生成
        $item = new Item();
        $item->user_id = $request->user_id;
        $item->item_category_id = $request->item_category_id;
        $item->name = $request->name;
        $item->explanation = $request->explanation;
        $item->price = $request->price;
        $item->shipping_const = $request->shipping_const;
        $item->stock_quantity = $request->stock_quantity;

        // インスタンスの状態をデータベースに書き込む
        $item()->save($item);

        return redirect()->route('item/complete');
    }

    //出品内容の保存
    public function complete(Request $request)
    {
        return view('item/complete');
    }
}
