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
            'type' => 'required|string',
            //口座番号
            'bank_number' => 'required|integer',
        ];
    }
        //日本語に変換
        public function attributes()
        {
            return [
            //講座名義人
            'name' => '口座名義人',
            //銀行名
            'bank_name' =>'銀行名',
            //支店名
            'branch_name' =>'支店名',
            //預金種別
            'bank_account' => '預金種別',
            //口座番号
            'bank_number' => '口座番号',
            ];
        }
}
