<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>C2C App</title>
        <link rel="stylesheet" href="/css/styles.css">
      </head>
    <body>
        <header>
            <nav class="my-navbar">
              <a class="my-navbar-brand" href="/">C2C App</a>
            </nav>
          </header>
          <div class="container">
            <div class="row">
                <h5>購入履歴一覧</h5>
                <div class="col-12">
                    <div style="display: flex; flex-wrap: wrap;">
      @foreach($paginate_list as $order_list)
      <div style="width:23%;box-sizing: border-box; margin:20px 1%; border: solid 2px gray; border-radius: 5px;">
      <a href="{{ route('orders.show', ['order_detail_id'=>$order_list['order_detail_id']]) }}" style="text-decoration: none; color:gray">
        <div style="width: 100%; height: 200px;">
            <img class="logo" src="{{ asset("storage/items/{$order_list['item_id']}/sample1.jpg") }}" width="auto" height="100%"  style="display: block; margin: auto;">
        </div>
        <div style="padding-bottom: 5px">
            {{$order_list['item_name']}}
        </div>
        <div style="padding-bottom: 5px">
            購入単価：{{$order_list['item_price']}}円
        </div>
        <div style="padding-bottom: 5px">
            購入数量：{{$order_list['order_detail_quantity']}}個
        </div>
        <div style="padding-bottom: 5px">
            小計：{{$order_list['order_detail_price']}}円
        </div>
        @if( $order_list['order_detail_status'] == 2)
        <div style="padding-bottom: 5px; color: red">
            状態：{{\App\Models\OrderDetail::STATUS[$order_list['order_detail_status']]['label']}}
            <p>※商品到着時に「到着済」へご変更お願いします。</p>
        </div>
        @else
        <div style="padding-bottom: 5px">
            状態：{{\App\Models\OrderDetail::STATUS[$order_list['order_detail_status']]['label']}}
        </div>
        @endif
        </a>
        </div>
      @endforeach
    </div>
</div>
      {{ $paginate_list->links('vendor.pagination.default') }}
      <a href="{{ route('mypage') }}">マイページへ戻る</a>
    </div>
</div>
    </body>
</html>

