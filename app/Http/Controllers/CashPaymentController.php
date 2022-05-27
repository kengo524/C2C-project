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
    //出金申請フォーム
    public function new()
    {
        $user = Auth::user();
        $user_id = Auth::id();
        $user_payable_amount = $user['payable_amount'];
        $user_bank_info = BankAccount::find($user_id);

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
        $user_bank_info = BankAccount::find($user_id);
        $balance_amount = $user_payable_amount - $request['payment_amount'];

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
        $user_bank_info = BankAccount::find($user_id);

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
}
