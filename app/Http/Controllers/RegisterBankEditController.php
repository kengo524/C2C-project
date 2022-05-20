<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BankAccount;

class RegisterBankEditController extends Controller
{
    //編集画面の表示
    public function show($id)
    {
        //編集対象のデータを取得して、テンプレートに渡す
         $user = User::find($id); //id番号を指定して、データ取得

        $login_user_id = auth()->user()->id;
        $bank_account = BankAccount::find($login_user_id);

        return view('register.bank.show', compact('user','bank_account'));
    }

    //変更完了画面の表示
    public function edit(Request $request)
    {
        // リクエストされた ID でデータを取得(編集対象)
        $login_user_id = auth()->user()->id;
        $bank_account = BankAccount::find($login_user_id);

        // 編集対象のデータにデータの入力値を詰めてDBに保存する
        $bank_account->name = $request->name;
        $bank_account->bank_name = $request->bank_name;
        $bank_account->branch_name = $request->branch_name;
        $bank_account->type = $request->type;
        $bank_account->bank_number = $request->bank_number;
        $bank_account->save();

        // 口座情報変更確認画面へリダイレクト
        return view('register.bank.edit', compact('bank_account'));
    }
}
