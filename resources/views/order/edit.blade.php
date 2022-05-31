<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>order_details</title>
    </head>
    <body>
      <div>ここは商品状態変更ページ</div>
      @foreach($order_lists as $order_list)
        <p><img class="logo" src="{{ asset("storage/items/{$order_list['item_id']}/sample1.jpg") }}" width="100" height="100"><br></p>
        {{-- <p>注文明細ID：{{$order_list['order_detail_id']}}</p>
        <p>注文ID：{{$order_list['order_id']}}</p> --}}
        <p>商品名：{{$order_list['item_name']}}</p>
        <p>金額：{{$order_list['item_price']}}</p>
        <p>小計：{{$order_list['order_detail_price']}}</p>
        <p>注文日：{{$order_list['order_date']}}</p>
        <p>状態：</p>
        <form method="POST" action="{{ route('orders.complete', ['order_detail_id'=>$order_list['order_detail_id']]) }}">
            @csrf
            <select name="status">
                <option value="2"selected='selected'>商品発送中</option>
                <option value="3">商品到着済み</option>
            </select><br>
            <input type="submit" value="変更する">
        </form>
      @endforeach
      <br>
      <a href="{{ route('orders.show', ['order_detail_id'=>$order_list['order_detail_id']]) }}">購入履歴詳細へ戻る</a>
    </body>
</html>
