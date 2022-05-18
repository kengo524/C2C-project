<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateItem extends FormRequest
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
            'name' => 'required|max:100',
            'explanation' => 'required|max:500',//500勝手につけたがいい？
            'item_category_id' => 'required',
            'price' => 'required|min:1',
            'stock_quantity' => 'required',
            'shipping_const' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '商品名',
            'explanation' => '商品説明',
            'item_category_id' => '商品カテゴリ',
            'price' => '価格',
            'stock_quantity' => '在庫数',
            'shipping_const' => '送料',
        ];
    }
}

