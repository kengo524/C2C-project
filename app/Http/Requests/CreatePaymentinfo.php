<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentinfo extends FormRequest
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
            'name' => 'required',
            'number1' => 'required|max:4|min:4',
            'number2' => 'required|max:4|min:4',
            'number3' => 'required|max:4|min:4',
            'number4' => 'required|max:4|min:4',
            'card_brand' => 'required',
            'due_date1' => 'required|max:2|min:2',
            'due_date2' => 'required|max:2|min:2',
            'cord' => 'required|max:3|min:3',

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'カード名義',
            'number1' => 'カード番号1',
            'number2' => 'カード番号2',
            'number3' => 'カード番号3',
            'number4' => 'カード番号4',
            'card_brand' => 'カード会社',
            'due_date1' => '有効期限(月)',
            'due_date2' => '有効期限(年)',
            'cord' => 'セキュリティコード',
        ];
    }
}
