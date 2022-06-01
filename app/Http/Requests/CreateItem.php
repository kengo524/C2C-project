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
            'explanation' => 'required|max:500',
            'item_category_id' => 'required',
            'price' => 'required|integer|numeric|min:1|regex:/^[!-~ ¥]+$/u',
            'stock_quantity' => 'required|regex:/^[!-~ ¥]+$/u',
            'shipping_const' => 'required|regex:/^[!-~ ¥]+$/u',
            'image' => 'required',
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

    public function prepareForValidation()
    {
        // 半角→全角 カナ
        $this->merge(['kana' => mb_convert_kana($this->kana, 'KCSA')]);

        // 全角→半角 英数(※変換できないものもあるので注意)
        $this->merge([
            'price' => mb_convert_kana($this->price, 'as'),
            'stock_quantity' => mb_convert_kana($this->stock_quantity, 'as'),
            'shipping_const' => mb_convert_kana($this->shipping_const, 'as')
        ]);
    }
}

