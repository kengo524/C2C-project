<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BankAccount;
use App\Http\Requests\RegisterBankEdit;

class RegisterBankEditController extends Controller
{
    //編集画面の表示+新規登録ボタンの追加
    public function show($id)
    {
        //編集対象のデータを取得して、テンプレートに渡す
         $user = User::find($id); //id番号を指定して、データ取得

        $login_user_id = auth()->user()->id;
        $bank_account = BankAccount::find($login_user_id);

        //既に口座番号保有している場合変更、そうでない場合新規登録への条件分岐
        if($bank_account == null){
            return view('register.bank.new', compact('user'));
        }else{
            return view('register.bank.show', compact('user','bank_account'));
        }
    }

    //変更完了画面の表示
    public function edit(RegisterBankEdit $request)
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
        // dd($bank_account);
        $bank_account->save();

        // 口座情報変更確認画面へリダイレクト
        return view('register.bank.edit', compact('bank_account'));
    }

    //新規登録に伴う保存処理
    public function create(RegisterBankEdit $request)
    {
        $login_user_id = auth()->user()->id;
        //編集対象のデータを取得して、テンプレートに渡す

        $bank_account = new BankAccount();
        $bank_account->user_id = $login_user_id;
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
