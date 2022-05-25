<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>listing</title>
    </head>
    <body>
      <div>ここは出品履歴一覧ページ</div>
      @foreach($items as $item)
      <a href="{{ route('list', ['id'=>$item->id]) }}">
        <p>{{$item->image}}</p>
        <p>商品名:{{$item->name}}</p>
        <p>金額:{{$item->price}}円</p>
        <p>在庫数:残り{{$item->stock_quantity}}個</p>
        <br>
      </a>
      @endforeach
      <a href="{{ route('mypage') }}">マイページへ戻る</a>
    </body>
</html>
