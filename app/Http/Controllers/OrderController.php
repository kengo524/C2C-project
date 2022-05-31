<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Item;
use App\Models\Cart;
use App\Models\User;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // //購入履歴一覧（ログインユーザが購入した商品全てを表示）
        $login_user_id = auth()->user()->id;
        //ログインしているユーザが購入した商品(つまりこの情報が表示されればok)
        $orders = Order::where('user_id', $login_user_id)->get();

        $order_lists = [];
        foreach($orders as $order){
            //Viewに渡すのに必要な情報を得るためにテーブルを連携させる
            $order_id = $order->id;
            $order_details = OrderDetail::where('order_id', $order_id)->get();
            $order_ids[] = $order->id;
            foreach($order_details as $order_detail){
                $item_id = $order_detail->item_id;
                $items = Item::find($item_id);

                //Viewに渡すもの
                $order_data = [
                    'order_id' => $order['id'],
                    'item_id' => $items['id'], //商品id itemsテーブル
                    'item_image' => $items['image'],// 商品画像　itemsテーブル
                    'item_name' => $items['name'],// 商品名 itemsテーブル
                    'item_price' => $items['price'],// 金額 itemsテーブル
                    'order_detail_quantity' => $order_detail['quantity'],// 数量 order_detailsテーブル
                    'order_detail_price' => $order_detail['price']// 小計 order_detailsテーブル
                ];
            $order_lists[] = $order_data;
            }
        }

        $orderPaginate = collect($order_lists);

        $paginate_list = new LengthAwarePaginator(
            $orderPaginate->forPage($request->page, 20),
            count($orderPaginate),
            20,
            $request->page,
            ['path' => $request->url()]
        );

        return view('order.index', [
            'order_lists' => $order_lists,
            'paginate_list' => $paginate_list
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order_id = $id;
        $order_details = OrderDetail::where('order_id',$order_id)->get();
        return view('order.show',compact('order_details'));
    }

    //注文DBへの保存処理+注文DB詳細への保存＋カートDB削除同時実行
    public function create(Request $request)
    {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        $items = Item::get();
        $shipping_address = ShippingAddress::find($user_id);

        //カート内の各商品が購入確定時に在庫内か判別
        foreach($cart_items as $cart_item){
            if($cart_item->quantity > $items[$cart_item->item_id-1]->stock_quantity){
                return redirect()->route('cart.quantity_error');
            }else{
            }
        }

        //在庫範囲内であれば下記フローを実行
        //注文DBへの保存
        $order = new Order();
        $order->user_id = $user_id;
        $order->price = $request['total_price'];
        $order->shipping_name = $shipping_address->name;
        $order->postal_code = $shipping_address->postal_code;
        $order->address = $shipping_address->address;
        $order->phone_number = $shipping_address->phone_number;
        $order->shipping_date = $request->shipping_date;
        $order->save();

        //注文詳細DBの保存+商品在庫の調整+出品user売上計上
        foreach($cart_items as $cart_item){
            $orderDetail = New OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->item_id  = $cart_item->item_id;
            $orderDetail->quantity = $cart_item->quantity;
            $orderDetail->price = ($items[$cart_item->item_id-1]->price)*($cart_item->quantity);
            $orderDetail->save();

            Item::find($cart_item->item_id)->update(['stock_quantity' => ($items[$cart_item->item_id-1]->stock_quantity) - ($cart_item->quantity)]);

            $listing_user = User::where('id', $items[$cart_item->item_id-1]->user_id)->first();
            $listing_user->payable_amount += ($items[$cart_item->item_id-1]->price)*($cart_item->quantity);
            $listing_user->update();
        }

        //カートDB削除
        $cart_items->each->delete();

        return redirect()->route('cart.complete');

    }
}
