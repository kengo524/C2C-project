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

            <div class="panel-heading">カート商品内容</div>
                @foreach($result as $item_info)
                画像:{{$item_info['image']}}<br>
                商品名:{{$item_info['name']}}<br>
                数量:{{$item_info['quantity']}}<br>
                小計:{{$item_info['subtotal']}}円<br>
                <p>**********************</p>
                @endforeach
                <div>
                    <p>$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$</p>
                    <p>合計：{{ $total_price }}円</p>
                    <p>送料：{{ $total_shipping_cost }}円</p>
                    <p>お支払い金額：{{ $payment_amount }}円</p>
                </div>

            <div class="panel-heading">配送先情報確認</div>
            <div>
                <p>氏名：{{ $shipping_address->name }}</p>
                <p>郵便番号：{{ $shipping_address->postal_code }}</p>
                <p>住所：{{ $shipping_address->address }}</p>
                <p>電話番号：{{ $shipping_address->phone_number }}</p>
            </div>
            <div>
                <p>:::::::::::::::::::::::::</p>
                <div class="form-group">
                    <label for="name">お届け予定日</label>
                    <p>{{ $request['shipping_date'] }}</p>
                </div>
            </div>

            <div class="panel-heading">決済情報入力</div>
                <div class="form-group">
                    <label for="name">カード名義</label>
                    <p>{{ $request['name'] }}</p>
                </div>
                <div class="form-group">
                    <label for="number">カード番号</label>
                    <p>●●●●-●●●●-●●●●-{{ $request['number4'] }}</p>
                </div>
                <div class="form-group">
                    <label for="card_brand">カード会社</label>
                    <p>{{ $request['card_brand'] }}</p>
                </div>
                <div class="form-group">
                    <label for="due_date">有効期限</label>
                    <p>{{ $request['due_date1'] }}/{{ $request['due_date2'] }}</p>
                </div>
                <div class="form-group">
                    <label for="cord">セキュリティコード</label>
                    <p>{{ $request['cord'] }}</p>
                </div>

                <form action="{{ route('orders.create') }}" method="post">
                    @csrf
                    <input type="hidden" class="form-control" name="shipping_date" id="shipping_date" value="{{ $request['shipping_date'] }}" />
                    <input type="hidden" class="form-control" name="total_price" id="total_price" value="{{ $total_price }}" />
                <div class="text-right">
                <button type="submit" class="btn btn-primary">注文確定へ</button>
                </div>
                </form>
                <div>
                    <button type="button" onClick="history.back()">戻る</button>
                </div>
          </nav>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
