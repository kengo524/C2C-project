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
          <main>
            <div class="container">
              <div class="row">
                <div class="col col-md-offset-3 col-md-6">
                    <nav class="panel panel-default">
                    <div class="panel-heading">購入情報詳細</div>
                      <div class="panel-body">

      @foreach($order_lists as $order_list)

        <p><img class="logo" src="{{ asset("storage/items/{$order_list['item_id']}/sample1.jpg") }}" width="100" height="100"><br></p>
        <p>注文日：{{$order_list['order_date']}}</p>
        <p>商品名：{{$order_list['item_name']}}</p>
        <p>金額：{{$order_list['item_price']}}円</p>
        <p>小計：{{$order_list['order_detail_price']}}円</p>
        <p>状態：</p>
            {{--もしstatusが2だったら変更画面へ--}}
            @if($order_list['order_status'] == 2)
                <p>{{\App\Models\OrderDetail::STATUS[$order_list['order_status']]['label']}}</p>
                <a href="{{ route('orders.edit', ['order_detail_id'=>$order_list['order_detail_id']]) }}">商品状態変更</a>
                <p>※商品到着時に、「到着済」へのご変更をお願いします。</p>
            @else
                {{--もしstatusが2以外だったら<p>タグで表示するだけ--}}
                <p>{{\App\Models\OrderDetail::STATUS[$order_list['order_status']]['label']}}</p>
            @endif

      @endforeach
    </div>
      <a href="{{ route('orders.index') }}">購入履歴一覧へ戻る</a>
    </div>
</nav>
</div>
</div>
</div>
</main>
    </body>
</html>
