<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterShippingaddressEdit extends FormRequest
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
            //郵便番号（ハイフンなし）
            'postal_code' =>'required|integer|digits:7',
            //住所
            'address' =>'required|string',
            //電話番号(ハイフンなし)最大値一旦削除
            'phone_number' =>'required|integer|min:10',
            //氏名
            'name' =>'required|max:20',
        ];
    }

    public function attributes()
    {
        return [
            //郵便番号（ハイフンなし）
            'postal_code' =>'郵便番号',
            //住所
            'address' =>'住所',
            //電話番号(ハイフンなし)
            'phone_number' =>'電話番号',
            //氏名
            'name' =>'氏名',
        ];
    }
    public function messages()
    {
        return [
            'phone_number.min' => ':attribute は１０文字以上１１文字以下で設定してください。',
            'phone_number.max' => ':attribute は１０文字以上１１文字以下で設定してください。',
            'postal_code.digits' => '正しい:attributeを入力してください。',
            'name.max' => ':attribute は２０文字以下で設定してください。',
        ];
    }
}
