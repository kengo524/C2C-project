<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUsersEdit extends FormRequest
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

     //入力欄ごとにチェックするルール
    public function rules()
    {
        return [
            //NickName
            'nick_name' => 'required|max:20',
            //Email
            'email' => 'required|email|unique:users',
            //Password
            'password' => 'required|string|min:8',
            //PhoneNumber（ハイフンなし）
            'phone_number' => 'required|string|max:11|min:10',
            //PostalCode（ハイフンなし）
            'postal_code' => 'required|string|digits:7',
            //Address
            'address' => 'required|string',
        ];
    }
}
