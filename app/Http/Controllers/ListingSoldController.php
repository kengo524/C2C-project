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
            // dd($item);
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
            // dd($list);
            $order_list[] = $order_data;
        }
        // dd($order_list);
        // dd($items[$order_detail[$item_id]]->name);
        return view('listing-sold.index',compact('order_list'));
    }

    public function show($id)
    {
        // dd($id);
        //成約済み商品詳細で表示する状態データを取得
        $login_user_id = auth()->user()->id;
        //ログインユーザーが出品した商品かつ、クリックした商品のitem_idを取得
        // $matchThese = ['user_id' => $login_user_id, 'id' => $id];
        $item = Item::where('id', $id)->get()[0]; //(ログインしているユーザが)出品した商品一覧
        //itemsに入っている商品一つずつがorder_detailsにあるかどうか
        $constracted_list = [];
        // foreach($items as $item){
        $item_id = $item->id;
        // その商品(ログインユーザが出品した商品ID)が含まれるオーダー(order_details)をとる
        $order_details = OrderDetail::where('item_id', $item_id)->get();

        //成約した商品を取引した人たちの情報を集める
        //まず、成約した商品の一つ一つ情報を表示
        $constructed_list =[];
        //$order_detailでお届け先情報が保存されているから、それを持ってくれば配送先情報取り込める。
        foreach($order_details as $order_detail){
            //次に、その中で、その商品を取引した人の情報を取得していく
            //order_detailsテーブルのorder_idとordersテーブルのidを結びつけ
            // dd(count($order_details));
            $order_id = $order_detail->order_id;
            $order_info = Order::where('id', $order_id)->get()[0];
            // //$order_infoでordersテーブルの情報を一つずつとれるようにする
            // dd(count($orders_info));
            // foreach($orders_info as $order_info){
            //     //shipping_addressesテーブルのuser_idとordersテーブルのuser_idを結びつけ（つまり、購入者とお届け先情報の名前を結びつける）
            $user_id = $order_info->user_id;
            $shipping_address_info = ShippingAddress::where('user_id', $user_id)->get()[0];

            //viewに渡したい値
            $constracted_info = [
                'item_image' => $item['image'],
                'item_name' => $item['name'],
                'item_price' => $item['price'],
                'order_date' => $order_detail['created_at'],
                'order_name' => $shipping_address_info['name'],
                'shipping_address' => $shipping_address_info['address'],
                'shipping_phone_number' => $shipping_address_info['phone_number'],
                'order_status' => $order_detail['status']
            ];
            $constracted_lists[] = $constracted_info;
            //     //$shipping_addressで購入者のお届け先情報を取得できるようにする
            //     dd(count($shipping_addresses_info));
            //     foreach($shipping_addresses_info as $shipping_address_info){
            //         // dd($shipping_address_info);
            //

            //         // dd($constracted_info);
            //         //$listに入れて$constracted_info自体を連想配列にする（$constracted_infoの値を取り出せるようにする）
            //         // $list = [$constracted_info];
            //         // dd($list);
            //
            //         // dd($constracted_list);
            //         // dd($constracted_list['order_name']);
            //     }
            // }
        }

        // }
        return view('listing-sold.show',compact('constracted_lists'));
    }
}
