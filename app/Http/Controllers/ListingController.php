<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function index(){
        //出品履歴一覧で表示するデータ取得
        $login_user_id = auth()->user()->id;
        $items = Item::where('user_id', $login_user_id)->get();
        return view('listing.index',compact('items'));
    }

    //出品履歴詳細で表示するデータ取得
    public function show($id)
    {
        $user_id = Auth::id();
        $item_id = $id;
        $item_detail = Item::find($item_id);
        if(!($user_id == $item_detail->user_id)){
            abort(404);
        }
        return view('listing.show',compact('item_detail'));
    }

    //出品履歴詳細編集画面表示
    public function edit($id)
    {
        $item_id = $id;
        $item_detail = Item::find($item_id);
        $user_id = Auth::id();
        //別ユーザーのアクセス制限
        if(!($user_id == $item_detail->user_id)){
            abort(404);
        }

        //カートに入ってないときのみ編集できるようにする
        $carts = Cart::where('item_id', $item_id)->count();
        //もしcartsテーブルにitemテーブルのitem_idが0個だったら、出品商品編集画面へ
        if ($carts == 0){
            return view('listing.edit',compact('item_detail'));
        } else{
        //カートに商品が入ってれば出品履歴詳細エラーページ画面へ
        return view('listing.error',compact('item_detail'));
        }
    }

    public function edited($id, Request $request)
    {
        //リクエストされたIDで編集対象のデータ取得
        $item_id = $id;
        $item_detail = Item::find($item_id);

        //編集対象のデータにデータの入力値を詰めてDBに保存
        $item_detail->name = $request->name;
        $item_detail->price = $request->price;
        $item_detail->stock_quantity = $request->stock_quantity;
        $item_detail->status = $request->status;
        $item_detail->save();

        return view('listing.edited', compact('item_detail'));
    }

    // public function delete($id)
    // {
    //     //削除するデータ取得
    //     $item_id = $id;
    //     $item_detail = Item::find($item_id);

    //     $carts = Cart::where('item_id', $item_id)->get();
    //     dd($carts);
    //     //もしcartsテーブルにitemテーブルのitem_idがあったら、出品商品削除エラーページへ
    //     //whereは配列だから、値を取り出したいときは、$carts[0]->item_idってしないと取り出せない
    //     //でも、ifの条件って意外と緩いから、要素に関連しなくてもいいなら配列があるかどうかの判断だけでも全然OK
    //     if ($carts){
    //         return view('listing.error',compact('item_detail'));
    //     } else{
    //     //そうじゃなかったら削除ページへ
    //     return view('listing.delete',compact('item_detail'));
    //     }
    // }

    // public function deleted($id, Request $request)
    // {
    //     //削除するデータ取得
    //     $item_id = $id;
    //     $item_detail = Item::find($item_id);

    //     //編集対象のデータにデータの入力値を詰めてDBに保存
    //     $item_detail->name = $request->name;
    //     $item_detail->price = $request->price;
    //     $item_detail->stock_quantity = $request->stock_quantity;
    //     $item_detail->delete();
    //     return redirect('listing');
    // }
}
