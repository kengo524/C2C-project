<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>listing_details</title>
    </head>
    <body>
      <div>成約済み商品詳細ページ</div>
        @csrf
        <p>{{$constracted_list['item_image']}}</p>
        <p>商品名:{{$constracted_list['item_name']}}</p>
        <p>金額:{{$constracted_list['item_price']}}円</p>
        <p>注文日:{{$constracted_list['order_date']}}</p>
        <p>購入者氏名:{{$constracted_list['shipping_name']}}</p>
        <p>配送先:{{$constracted_list['shipping_address']}}</p>
        <p>電話番号:{{$constracted_list['shipping_phone_number']}}</p>
        <p>状態:</p>
        <form method="POST" action="{{ route('listing-sold.complete', ['order_detail_id'=>$constracted_list['order_detail_id']]) }}">
            @csrf
            <select name="status">
                    <option value="1"selected='selected'>商品未発送</option>
                    <option value="2">商品発送中</option>
            </select><br>
            <input type="submit" value="変更する">
        </form>
    <a href="{{ route('listing-sold.index') }}">成約済み商品一覧へ戻る</a>
    </body>
</html>
