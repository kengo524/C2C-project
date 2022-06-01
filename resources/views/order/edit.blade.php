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
                    <div class="panel-heading">購入商品情報変更</div>
                      <div class="panel-body">

      @foreach($order_lists as $order_list)
        <p><img class="logo" src="{{ asset("storage/items/{$order_list['item_id']}/sample1.jpg") }}" width="100" height="100"><br></p>
        <p>注文日：{{$order_list['order_date']}}</p>
        <p>商品名：{{$order_list['item_name']}}</p>
        <p>金額：{{$order_list['item_price']}}円</p>
        <p>小計：{{$order_list['order_detail_price']}}円</p>
        <p>状態：</p>
        <form method="POST" action="{{ route('orders.complete', ['order_detail_id'=>$order_list['order_detail_id']]) }}">
            @csrf
            <select name="status">
                <option value="2"selected='selected'>商品発送中</option>
                <option value="3">商品到着済み</option>
            </select><br>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">変更する</button>
            </div>
        </form>
      @endforeach
      <br>
      <a href="{{ route('orders.show', ['order_detail_id'=>$order_list['order_detail_id']]) }}">購入履歴詳細へ戻る</a>
    </div>
</nav>
</div>
</div>
</div>
</main>
    </body>
</html>
