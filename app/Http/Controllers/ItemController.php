<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateItem;
use Illuminate\Http\Request;
use App\Image;//画像関係
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    //商品一覧
    public function itemDetail($id){

        $item = Item::find($id);
        $categories = ItemCategory::get();

        return view('item.detail',compact('item','categories'));
    }
  
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
        // すべての商品カテゴリを取得する
        $item_categories = ItemCategory::all();
        $item_category_name = ItemCategory::find($request['item_category_id'])->name;

        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();

        //選択した画像のプレビュー表示
        $file = file_get_contents($request['image']);//画像の情報だけを文字列化
        $imageText = base64_encode($file);
        $inputs['image'] = $imageText;

        //入力内容確認ページのviewに変数を渡して表示
        return view('item.confirm', [
            'request' => $inputs,
            'item_category_name' => $item_category_name,
            'imageText' => $imageText,
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
        //画像はデコードを行い、ストレージに保存したものをカラムに代入
        $image = base64_decode($request['image']);
        Storage::put('sample1.jpg', $image);

        $item->image = 'sample1.jpg';

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
