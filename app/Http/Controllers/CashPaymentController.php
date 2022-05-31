<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BankAccount;
use App\Http\Requests\CreateCashPayment;
use App\Models\CashPayment;
use Illuminate\Support\Facades\Auth;

class CashPaymentController extends Controller
{
    //出金履歴一覧
    public function index()
    {
        $user_id = Auth::id();
        $cashpayment_history = CashPayment::where('user_id', $user_id)->get();

        return view('cashpayment.index', compact(
            'cashpayment_history'
        ));
    }

    //出金申請フォーム
    public function new()
    {
        $user = Auth::user();
        $user_id = Auth::id();
        $user_payable_amount = $user['payable_amount'];
        $user_bank_info = BankAccount::where('user_id', $user_id)->first();

        return view('cashpayment.new', compact(
            'user_id',
            'user_payable_amount',
            'user_bank_info'
        ));
    }

    //出金確認画面
    public function confirm(CreateCashPayment $request)
    {
        $user = Auth::user();
        $user_id = Auth::id();
        $user_payable_amount = $user['payable_amount'];
        $user_bank_info = BankAccount::where('user_id',$user_id)->first();
        $balance_amount = $user_payable_amount - $request['payment_amount'];

        if($request['payment_amount'] > $user_payable_amount){
            return redirect()->route('cashpayment.over_error');
        }else{
        }

        return view('cashpayment.confirm', compact(
            'user_id',
            'user_payable_amount',
            'user_bank_info',
            'request',
            'balance_amount'
        ));
    }

    //出金DB保存
    public function create(Request $request)
    {
        $user = Auth::user();
        $user_id = Auth::id();
        $user1 = User::find(1);
        $user_payable_amount = $user['payable_amount'];
        $user_bank_info = BankAccount::where('user_id',$user_id)->first();

        $cashpayment = new CashPayment();
        $cashpayment->user_id = $user_id;
        $cashpayment->payment_amount = $request['payment_amount'];
        $cashpayment->name = $user_bank_info->bank_name;
        $cashpayment->bank_name = $user_bank_info->branch_name;
        $cashpayment->branch_name = $user_bank_info->type;
        $cashpayment->bank_number = $user_bank_info->bank_number;
        $cashpayment->type = $user_bank_info->type;
        $cashpayment->save();

        $user->payable_amount = (int)$request->balance_amount;
        $user->update();

        return redirect()->route('cashpayment.complete');
    }

    //出金申請完了画面
    public function complete()
    {
        return view('cashpayment.complete');
    }

    //出金額＞引出可能額の場合
    public function over_error()
    {
        return view('cashpayment.over_error');
    }
}
