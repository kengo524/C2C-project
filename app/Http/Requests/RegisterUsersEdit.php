<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    public function rules(Request $request)
    {
        return [
            //NickName
            'nick_name' => 'required|max:20',
            //Email
            'email'     => [
                'required',
                // 重複チェック
                Rule::unique('users')->ignore($request->id, 'id'),
            ],
            //Password
            'password' => 'required|string|min:8',
            //PhoneNumber（ハイフンなし）
            'phone_number' => 'required|string|between:10,11',
            //PostalCode（ハイフンなし）
            'postal_code' => 'required|integer|digits:7',
            //Address
            'address' => 'required|string',
        ];
    }
    //日本語に変換
    public function attributes()
    {
        return [
            //NickName
            'nick_name' => 'ニックネーム',
            //Email
            'email' => 'メールアドレス',
            //Password
            'password' => 'パスワード',
            //PhoneNumber（ハイフンなし）
            'phone_number' => '電話番号',
            //PostalCode（ハイフンなし）
            'postal_code' => '郵便番号',
            //Address
            'address' => '住所',
        ];
    }

    public function messages()
    {
        return [
            'password.min' => ':attribute は８文字以上で設定してください。',
            'phone_number.between' => ':attribute は１０文字以上１１文字以下で設定してください。',
            'postal_code.digits' => '正しい:attributeを入力してください。',
        ];
    }
}
