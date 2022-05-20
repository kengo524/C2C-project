<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterBankEdit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //講座名義人
            'name' => 'required',
            //銀行名
            'bank_name' =>'required|string',
            //支店名
            'branch_name' =>'required|string',
            //預金種別
            'bank_account' => 'required|string',
            //口座番号
            'bank_number' => 'required|string',
        ];
    }
}
