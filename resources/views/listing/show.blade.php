<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>listing_details</title>
    </head>
    <body>
      <div>ここは出品履歴詳細ページ</div>
      {{-- @foreach($item_details as $item_detail) --}}
        <p>{{$item_detail->image}}</p>
        <p>商品名:{{$item_detail->name}}</p>
        <p>金額:{{$item_detail->price}}円</p>
        <p>在庫数:残り{{$item_detail->stock_quantity}}個</p>
      {{-- @endforeach --}}
      <a href="{{ route('list.edit', ['id'=>$item_detail->id]) }}">編集</a>
      {{-- <a href="{{ route('list.delete', ['id'=>$item_detail->id]) }}">削除</a> --}}
      <a href="{{ route('listing') }}">出品履歴一覧へ戻る</a>
    </body>
</html>
