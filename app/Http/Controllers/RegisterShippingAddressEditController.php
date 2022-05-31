<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterShippingAddressEdit;

class RegisterShippingAddressEditController extends Controller
{
    //編集画面の表示
    public function show($id)
    {
        //編集対象のデータを取得して、テンプレートに渡す
        $user = User::find($id); //id番号を指定して、データ取得

        $login_user_id = auth()->user()->id;
        $shipping_address = ShippingAddress::where('user_id',$login_user_id)->first();

        //配送先情報がない場合新規登録画面へ遷移
        if($shipping_address == null){
            return view('register.shippingaddress.new', compact('user'));
        }else{
            return view('register.shippingaddress.show', compact('user','shipping_address'));
        }
    }

        //変更完了画面の表示
        public function edit($id, RegisterShippingAddressEdit $request)
        {
            // リクエストされた ID でデータを取得(編集対象)
            // $user = User::find($id);
            $login_user_id = auth()->user()->id;
            $shipping_address = ShippingAddress::where('user_id',$login_user_id)->first();

            // 編集対象のデータにデータの入力値を詰めてDBに保存する
            $shipping_address->postal_code = $request->postal_code;
            $shipping_address->address = $request->address;
            $shipping_address->phone_number = $request->phone_number;
            $shipping_address->name = $request->name;
            $shipping_address->save();

            // お届け先情報変更確認画面へリダイレクト
            // return view('register.shippingaddress.edit', compact('user','shipping_address'));
            return view('register.shippingaddress.edit', compact('shipping_address'));
        }

        //新規登録に伴う保存処理
    public function create(RegisterShippingAddressEdit $request)
    {
        $login_user_id = auth()->user()->id;
        //編集対象のデータを取得して、テンプレートに渡す
        $shipping_address = new ShippingAddress();
        $shipping_address->user_id = $login_user_id;
        $shipping_address->name = $request->name;
        $shipping_address->postal_code = $request->postal_code;
        $shipping_address->address = $request->address;
        $shipping_address->phone_number = $request->phone_number;
        $shipping_address->save();

        // 口座情報変更確認画面へリダイレクト
        return view('register.shippingaddress.edit');
    }
}
