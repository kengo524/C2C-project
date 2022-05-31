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
                <h5>成約済み商品一覧</h5>
                    <div class="col-12">
                        <div style="display: flex; flex-wrap: wrap;">
                        @foreach($order_list as $order)
                        <div style="width:23%;box-sizing: border-box; margin:20px 1%; border: solid 2px gray; border-radius: 5px;">
                        <a href="{{ route('listing-sold.show', ['id'=>$order['item_id']]) }}" style="text-decoration: none; color:gray">
                            <div style="width: 100%; height: 200px;">
                                <img class="logo" src="{{ asset("storage/items/{$order['item_id']}/sample1.jpg") }}" width="auto" height="100%"  style="display: block; margin: auto;">
                            </div>
                            <div style="padding-bottom: 5px">
                                商品名：{{$order['item_name']}}
                            </div>
                            <div style="padding-bottom: 5px">
                                価格：{{$order['item_price']}}円
                            </div>
                            <div style="padding-bottom: 5px">
                                在庫数:残り{{$order['item_stock_quantity']}}個
                            </div>
                            <div style="padding-bottom: 5px">
                                購入者数（件数）:{{$order['constracted_number']}}件
                            </div>
                            @if($order['undispatched_number'] == 0)
                            <div style="padding-bottom: 5px">
                                未発送件数:{{$order['undispatched_number']}}件
                            </div>
                            @else
                            <div style="padding-bottom: 5px; color: red">
                                未発送件数:{{$order['undispatched_number']}}件
                            </div>
                            @endif
                            <br>
                        </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <a href="{{ route('mypage') }}">マイページへ戻る</a>
            </div>
        </div>
    </body>
</html>
