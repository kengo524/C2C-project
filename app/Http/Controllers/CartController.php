<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Cart;
use App\Models\User;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePaymentinfo;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //カート内表示
    public function cartlist()
    {
        $login_user = auth()->user();
        $login_user_id = auth()->user()->id;
        $cart_items = Cart::where('user_id', $login_user_id)->get();
        $cart_counts = Cart::where('user_id', $login_user_id)->count();
        $items = Item::get();

        //カート商品を配列を用いて格納、表示
        $result = [];
        $total_price = 0;
        $total_shipping_cost = 0;
        //1つの商品ごとに分類、回す
        foreach($cart_items as $cart_item){
            $item_id = $cart_item->item_id;
            $item = $items[$item_id-1];

            //まず、商品ごとのリストを作る。
            $list = [
                'cart_id' => $cart_item->id,
                'item_id' => $item->id,
                'image' => $item->image,
                'name' => $item->name,
                'quantity' => $cart_item->quantity,
                'subtotal' => $item->price * $cart_item->quantity,
            ];

            //そのリストを配列に格納
            $result[] = $list;
            $total_price += $item->price * $cart_item->quantity;
            $total_shipping_cost += $item->shipping_const;
        }
        $payment_amount = $total_price + $total_shipping_cost;

        return view('cart.cartlist', compact(
            'cart_items',
            'total_price',
            'total_shipping_cost',
            'payment_amount',
            'result',
            'cart_counts'
        ));

    }

    // カート追加
    //addする際、自分の商品は入れられないようvalidation設定（購入不可）。
    //カートに追加する際、在庫以上追加できないよう設定。
    public function add(Request $request)
    {
        $user_id = Auth::id();
        $matchThese = ['user_id' => $user_id, 'item_id' => $request->item_id];
        $count = Cart::where($matchThese)->count();
        $cart_item = Cart::where($matchThese)->first();
        $cart_total_quantity = 0;
        $item = Item::find($request->item_id);
        $carts = Cart::where('item_id', $request->item_id)->get();

        //ログインしていないとカートへの追加はできない。
        if($user_id == null){
            return redirect()->route('register');
        }

        //カート商品追加の条件分岐（追加or増加）
        if($count == 0)
        {
            //カートに同一商品がない場合
            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->item_id = $request->item_id;
            $cart->quantity = $request->quantity;
            $cart->save();
        }else{
            if($request->quantity + $cart_item->quantity > $item->stock_quantity){
                return redirect()->route('cart.add_error');
            }else{
                //既にログインユーザーのカート内に同一商品があった場合、数量増加
                $cart_item->update(['quantity' => ($cart_item->quantity) + ($request->quantity)]);
            }
        }

        //Warningメッセージ表示
        foreach($carts as $cart){
            $cart_total_quantity += $cart->quantity;
        }
        if($request->quantity + $cart_total_quantity> $item->stock_quantity){
            $request->session()->flash('message', '他のユーザーも今追加された商品をカート追加されております。お早めにお買い求めください。');
        }else{
        };

        return redirect()->route('cart.cartlist');
    }

    //発送情報の呼び出し
    public function shippinginfo(){
        $user = Auth::user();
        $user_id = Auth::id();
        $shipping_address = ShippingAddress::find($user_id);
        // $shipping_date = date("Y-m-d",strtotime("+6 day"));

        //発送情報未登録の場合は、自動的に入力画面で登録するよう設定。
        if($shipping_address == null){
            return view('register.shippingaddress.new',compact('user', 'shipping_address'));
        }else{
            return view('cart.shippinginfo',compact(
                'user',
                'user_id',
                'shipping_address'
            ));
        }
    }

    //決済内容の入力
    public function paymentinfo(Request $request){
        $request = $request->all();
        $card_brands = ["VISA", "JCB", "MasterCard"];
        return view('cart.paymentinfo', compact('card_brands','request'));
    }

    //決済情報、カート内容、発送情報の呼び出し
    public function confirm(CreatePaymentinfo $request){
        $request = $request->all();
        $login_user = Auth::user();
        $user_id = Auth::id();
        $shipping_address = ShippingAddress::find($user_id);
        // $shipping_date = date("Y-m-d",strtotime("+6 day"));
        $cart_items = Cart::where('user_id', $user_id)->get();
        $items = Item::get();

        // $total_price = 0;
        // $total_shipping_cost = 0;
        // foreach($cart_items as $cart_item){
        //     $total_price += ($items[$cart_item->item_id]->price)*($cart_item->quantity);
        //     $total_shipping_cost += $items[$cart_item->item_id]->shipping_const;
        // }

        // $payment_amount = $total_price + $total_shipping_cost;

        // return view('cart.confirm', compact(
        //     'request',
        //     'cart_items',
        //     'items',
        //     'total_price',
        //     'total_shipping_cost',
        //     'payment_amount',
        //     'shipping_addresses',
        //     'shipping_date',
        // ));

        $result = [];
        $total_price = 0;
        $total_shipping_cost = 0;
        //1つの商品ごとに分類、回す
        foreach($cart_items as $cart_item){
            $item_id = $cart_item->item_id;
            $item = $items[$item_id-1];

            //まず、商品ごとのリストを作る。
            $list = [
                'cart_id' => $cart_item->id,
                'item' => $item,
                'image' => $item->image,
                'name' => $item->name,
                'quantity' => $cart_item->quantity,
                'subtotal' => $item->price * $cart_item->quantity,
            ];

            //そのリストを配列に格納
            $result[] = $list;
            $total_price += $item->price * $cart_item->quantity;
            $total_shipping_cost += $item->shipping_const;
        }

        $payment_amount = $total_price + $total_shipping_cost;

        return view('cart.confirm', compact(
            'cart_items',
            'total_price',
            'total_shipping_cost',
            'payment_amount',
            'result',
            'shipping_address',
            'request'
        ));
    }

    //新規出品完了画面
    public function complete()
    {
        return view('cart.complete');
    }

    // カート内商品の個別削除
    public function delete($id)
    {
        $cartDetail = Cart::find($id);
        $cartDetail->delete();

        return redirect()->route('cart.cartlist');
    }

    //注文確定時、在庫以上の購入ができないエラー表示
    public function quantity_error(){
        return view('cart.quantity_error');
    }

    //カート追加時、在庫以上の追加が出来ないエラー表示
    public function add_error(){
        return view('cart.add_error');
    }
}
