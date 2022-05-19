<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $login_user_id = auth()->user()->id;
        $orders = Order::where('user_id', $login_user_id)->get();
        return view('order.index',compact('orders'));
        //
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
}
