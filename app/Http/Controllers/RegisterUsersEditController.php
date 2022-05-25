<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterUsersEdit;
use App\Models\ShippingAddress;

class RegisterUsersEditController extends Controller
{
    //編集画面の表示
    public function show($id)
    {
        //編集対象のデータを取得して、テンプレートに渡す
        $login_user_id = auth()->user()->id;
        $user = User::find($login_user_id);

        return view('register.users.show', compact('user'));
    }

    public function edit(RegisterUsersEdit $request)
{
    // リクエストされた ID でタスクデータを取得(編集対象)
    $login_user_id = auth()->user()->id;
    $user = User::find($login_user_id);

    // 編集対象のタスクデータにデータの入力値を詰めてDBに保存する
    $user->nick_name = $request->nick_name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->phone_number = $request->phone_number;
    $user->postal_code = $request->postal_code;
    $user->address = $request->address;
    $user->save();

    // ユーザ情報変更確認画面へリダイレクト
    return view('register.users.edit', compact('user'));
}
}
