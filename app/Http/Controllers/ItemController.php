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
        ]);
    }

    //出品内容のDB保存
    public function create(Request $request)
    {
        // 現在ログインしているユーザー情報の取得
        $login_user = Auth::user();
        // 現在ログインしているユーザーのID取得
        $user_id = Auth::id();

        // フォルダモデルのインスタンスを生成
        $item = new Item();
        $item->user_id = $user_id;
        $item->category_id = $request->item_category_id;
        $item->name = $request->name;
        $item->explanation = $request->explanation;
        $item->price = $request->price;
        $item->shipping_const = $request->shipping_const;
        $item->stock_quantity = $request->stock_quantity;
        $item->image = $request->image;

        // インスタンスの状態をデータベースに書き込む
        $item->save();

        return redirect()->route('item.complete');
    }

    //新規出品完了画面
    public function complete()
    {
        return view('item.complete');
    }

}
