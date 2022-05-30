<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ShippingAddress;

class ListingSoldController extends Controller
{
    //成約済み商品（未発送商品）一覧
    public function index(){
        //成約済み商品一覧で表示する状態データを取得
        $login_user_id = auth()->user()->id;
        $items = Item::where('user_id', $login_user_id)->get(); //ログインしているユーザが出品した商品一覧

        //itemsに入っている商品一つずつがorder_detailsにあるかどうか
        $order_list = [];
        foreach($items as $item){
            $item_id = $item->id;
            // その商品(ログインユーザが出品した商品ID)が含まれるオーダー(order_details)をとる
            $order_details = OrderDetail::where('item_id', $item_id)->get();

            // 件数(同じ商品何個も出品してるからその中で、成約してる商品のみ取り出す)
            $constracted_number = count($order_details);

            //件数が０（成約してない商品）は表示させないから、件数が０じゃないものを取得
            if(!$constracted_number ){
               continue;
            }
            // 未発送件数
            //$numの初期化
            $undispatched_number = 0;
            //成約済み商品を1つずつだして、その、商品の状態が未発送（１の時）の数を数える
            foreach($order_details as $order_detail){
                if($order_detail['status'] == 1){
                    $undispatched_number +=1;
                }
            }
            //viewに渡したい情報をあらかじめ連想配列にしておく
            $order_data = [
                'item_id' => $item['id'],
                'item_image' => $item['image'],
                'item_name' => $item['name'],
                'item_price' => $item['price'],
                'item_stock_quantity' => $item['stock_quantity'],
                'constracted_number' => $constracted_number,
                'undispatched_number' => $undispatched_number
            ];
            $list = [$order_data];
            $order_list[] = $order_data;
        }

        return view('listing-sold.index',compact('order_list'));
    }

    public function show($item_id)
    {
        //viewに渡すものをまとめている
        $constructed_list =[];

        //成約済み商品詳細で表示するデータを取得
        $item = Item::find( $item_id);
        $order_details = OrderDetail::where('item_id', $item_id)->get();

        foreach($order_details as $order_detail){
            //以下住所を取得するためにorder_detail=>order=>shippingAddressという流れで取得している
            $order_id = $order_detail->order_id;
            $order = Order::find($order_id);
            //shipping_addressesテーブルのuser_idとordersテーブルのuser_idを結びつけ（つまり、購入者とお届け先情報の名前を結びつける）
            // $order_user_id = $order->user_id;
            // $shipping_address_info = ShippingAddress::where('user_id', $order_user_id)->get()[0];
            //ここまで

            //viewに渡したい値
            $constracted_info = [
                'item_id' => $item['id'],
                'item_image' => $item['image'],
                'item_name' => $item['name'],
                'item_price' => $item['price'],
                'order_detail_id' => $order_detail['id'],
                'order_date' => $order_detail['created_at'],//注文日
                'shipping_name' => $order['shipping_name'],//購入者氏名
                'shipping_address' => $order['address'],//購入者送付先
                'shipping_phone_number' => $order['phone_number'],//購入者電話番号
                'order_status' => $order_detail['status']//商品の発送状態
            ];
            $constracted_lists[] = $constracted_info;
        }
        return view('listing-sold.show',compact('constracted_lists'));
    }

    public function edit($order_detail_id){
    //成約済み商品変更画面で表示するデータ取得
    $order_detail = OrderDetail::find($order_detail_id);
    $item = Item::find($order_detail->item_id);
    $order = Order::find($order_detail->order_id);
        //購入者の情報取得
        $constracted_list = [
            'item_id' => $item['id'],
            'item_image' => $item['image'],
            'item_name' => $item['name'],
            'item_price' => $item['price'],
            'order_detail_id' => $order_detail['id'],
            'order_date' => $order_detail['created_at'],
            'shipping_name' => $order['shipping_name'],
            'shipping_address' => $order['address'],
            'shipping_phone_number' => $order['phone_number'],
            'order_status' => $order_detail['status']
        ];
    return view('listing-sold.edit', compact('constracted_list'));
    }

    public function complete($order_detail_id, Request $request){
        //statusのデータ取得に必要なorder_detailテーブルを取得
        $order_detail = OrderDetail::find($order_detail_id);

        //変更した配送状況のstatusをDBに保存
        $order_detail->status = $request->status;
        $order_detail->save();
        return view('listing-sold.complete', compact('order_detail'));
    }
}
