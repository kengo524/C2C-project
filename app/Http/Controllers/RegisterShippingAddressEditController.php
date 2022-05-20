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
        $shipping_address = ShippingAddress::find($login_user_id);
        return view('register.shippingaddress.show', compact('user','shipping_address'));
    }

        //変更完了画面の表示
        public function edit($id, RegisterShippingAddressEdit $request)
        {
            // リクエストされた ID でデータを取得(編集対象)
            $user = User::find($id);
            $login_user_id = auth()->user()->id;
            $shipping_address = ShippingAddress::find($login_user_id);

            // 編集対象のデータにデータの入力値を詰めてDBに保存する
            $shipping_address->postal_code = $request->postal_code;
            $shipping_address->address = $request->address;
            $user->phone_number = $request->phone_number;
            $shipping_address->name = $request->name;
            $shipping_address->save();
            $user->save();

            // お届け先情報変更確認画面へリダイレクト
            return view('register.shippingaddress.edit', compact('user','shipping_address'));
        }
}
