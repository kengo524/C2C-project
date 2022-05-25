<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>order_details</title>
    </head>
    <body>
      <div>ここは購入履歴詳細ページ</div>
      @foreach($order_details as $order_detail)
        <p>注文詳細ID:{{$order_detail->id}}</p>
        <p>商品ID:{{$order_detail->item_id}}</p>
        <p>金額:{{$order_detail->price}}</p>
        <p>数量:{{$order_detail->quantity}}</p>
        <p>状態：{{ $order_detail->status_label }}</p>
      @endforeach
      <a href="{{ route('orders') }}">戻る</a>
    </body>
</html>
