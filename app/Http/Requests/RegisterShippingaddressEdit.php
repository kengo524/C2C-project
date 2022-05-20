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
            'postal_code' =>'required|string|digits:7',
            //住所
            'address' =>'required|string',
            //電話番号(ハイフンなし)
            'phone_number' =>'required|string|max:11|min:10',
            //氏名
            'name' =>'required|max:20',
        ];
    }
}
