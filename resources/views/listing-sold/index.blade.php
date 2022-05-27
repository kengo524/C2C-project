<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>listing-sold</title>
    </head>
    <body>
      <div>成約済み商品一覧</div>
      @foreach($order_list as $order)
      <a href="{{ route('listing-sold.show', ['id'=>$order['item_id']]) }}">
        <p>{{$order['item_image']}}</p>
        <p>商品名:{{$order['item_name']}}</p>
        <p>金額:{{$order['item_price']}}円</p>
        <p>在庫数:残り{{$order['item_stock_quantity']}}個</p>
        <p>購入者数（件数）:{{$order['constracted_number']}}件</p>
        <p>未発送件数:{{$order['undispatched_number']}}件</p>
        <br>
      </a>
      @endforeach
      <a href="{{ route('mypage') }}">マイページへ戻る</a>
    </body>
</html>
