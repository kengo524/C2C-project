<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>orders</title>
    </head>
    <body>
      <div>ここは購入履歴一覧ページ</div>
      @foreach($orders as $order)
      <a href="{{ route('order', ['id'=>$order->id]) }}">
        <p>注文ID:{{$order->id}}</p>
        <p>ユーザID:{{$order->user_id}}</p>
        <p>合計金額:{{$order->price}}</p>
        <p>注文日:</p>
      </a>
      <a href="{{ route('mypage') }}">マイページへ戻る</a>
      @endforeach
    </body>
</html>
