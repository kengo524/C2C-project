<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>order_lists</title>
    </head>
    <body>
      <div>ここは購入履歴一覧ページ</div>
      @foreach($order_lists as $order_list)
        <p>注文ID:{{$order_list->id}}</p>
        <p>ユーザID:{{$order_list->user_id}}</p>
        <p>合計金額:{{$order_list->price}}</p>
        <p>注文日:</p>

      @endforeach
    </body>
</html>
