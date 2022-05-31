<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>order_details</title>
    </head>
    <body>
      <div>ここは購入履歴詳細ページ</div>
      @foreach($order_lists as $order_list)
        <p><img class="logo" src="{{ asset("storage/items/{$order_list['item_id']}/sample1.jpg") }}" width="100" height="100"><br></p>
        {{-- <p>注文明細ID：{{$order_list['order_detail_id']}}</p>
        <p>注文ID：{{$order_list['order_id']}}</p> --}}
        <p>商品名：{{$order_list['item_name']}}</p>
        <p>金額：{{$order_list['item_price']}}</p>
        <p>小計：{{$order_list['order_detail_price']}}</p>
        <p>注文日：{{$order_list['order_date']}}</p>
        <p>状態：</p>
            {{--もしstatusが2だったら変更画面へ--}}
            @if($order_list['order_status'] == 2)
                <p>{{\App\Models\OrderDetail::STATUS[$order_list['order_status']]['label']}}</p>
                <a href="{{ route('orders.edit', ['order_detail_id'=>$order_list['order_detail_id']]) }}">商品状態変更</a>
            @else
                {{--もしstatusが2以外だったら<p>タグで表示するだけ--}}
                <p>{{\App\Models\OrderDetail::STATUS[$order_list['order_status']]['label']}}</p>
            @endif
      @endforeach
      <br>
      <a href="{{ route('orders.index') }}">購入履歴一覧へ戻る</a>
    </body>
</html>
