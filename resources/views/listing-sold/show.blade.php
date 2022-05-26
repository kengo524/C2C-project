<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>listing_details</title>
    </head>
    <body>
      <div>成約済み商品詳細ページ</div>
      @foreach($constracted_lists as $constracted_list)
        <p>{{$constracted_list['item_image']}}</p>
        <p>商品名:{{$constracted_list['item_name']}}</p>
        <p>金額:{{$constracted_list['item_price']}}円</p>
        <p>注文日:{{$constracted_list['order_date']}}</p>
        <p>購入者氏名:{{$constracted_list['order_name']}}</p>
        <p>配送先:{{$constracted_list['shipping_address']}}</p>
        <p>電話番号:{{$constracted_list['shipping_phone_number']}}</p>
        <p>状態:</p>
        <select name="status">
            @foreach(\App\Models\OrderDetail::STATUS as $key => $val)
                <option
                    value="{{ $key }}"
                    {{ $key == old('status', $constracted_list['order_status']) ? 'selected' : '' }}
                >
                  {{ $val['label'] }}
                </option>
            @endforeach
        </select>
      @endforeach
      {{-- <a href="{{ route('list.edit', ['id'=>$item_detail->id]) }}">編集</a> --}}
      <a href="{{ route('listing') }}">出品履歴一覧へ戻る</a>
    </body>
</html>
