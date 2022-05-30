<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>orders</title>
    </head>
    <body>
      <div>ここは購入履歴一覧ページ</div>
      @foreach($order_lists as $order_list)
      {{-- <a href="{{ route('order', ['id'=>$order_list['item_id']]) }}"> --}}
        <p>注文ID：{{$order_list['order_id']}}</p>
        <p>{{$order_list['item_image']}}</p>
        <p>商品名：{{$order_list['item_name']}}</p>
        <p>金額：{{$order_list['item_price']}}</p>
        <p>数量：{{$order_list['order_detail_quantity']}}</p>
        <p>小計：{{$order_list['order_detail_price']}}</p>
        <br>
        ------------------------------------------------------
      {{-- </a> --}}
      @endforeach
      {{-- {{ $pages->links() }} --}}
      {{ $pages->links('vendor.pagination.default') }}
      <a href="{{ route('mypage') }}">マイページへ戻る</a>
    </body>
</html>
