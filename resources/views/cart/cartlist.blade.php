<!DOCTYPE html>
<html lang="ja">
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
            <div class="panel-heading">ショッピングカート</div>
            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif
                @foreach($result as $item_info)
                <img class="logo" src="{{ asset("storage/items/{$item_info['item_id']}/sample1.jpg") }}" width="100" height="100"><br><br>
                商品名:{{$item_info['name']}}<br>
                数量:{{$item_info['quantity']}}<br>
                小計:{{$item_info['subtotal']}}円<br>
                <p>{{ $item_info['cart_id'] }}</p>
                <form action="{{ route('cart.delete',['id'=>$item_info['cart_id']]) }}" id="{{ $item_info['cart_id'] }}" method="post">
                    @csrf
                <input type="submit" class="btn btn-danger btn-dell" value="削除">
                </form>
                <p>**********************</p>
                @endforeach
                <div>
                    <p>-----------------------------------------------------------</p>
                    <p>合計：{{ $total_price }}円</p>
                    <p>送料：{{ $total_shipping_cost }}円</p>
                    <p>お支払い金額：{{ $payment_amount }}円</p>
                </div>

                <a href="{{ route('homepage') }}">買い物を続ける</a>
                <a href="{{ route('cart.shippinginfo') }}">購入手続きへ</a>
          </nav>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
