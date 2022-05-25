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
            <div class="panel-heading">配送先情報確認</div>
                <div>
                    <p>氏名：{{ $shipping_addresses->name }}</p>
                    <p>郵便番号：{{ $shipping_addresses->postal_code }}</p>
                    <p>住所：{{ $shipping_addresses->address }}</p>
                    <p>電話番号：{{ $shipping_addresses->phone_number }}</p>
                </div>
                <div>
                    <p>:::::::::::::::::::::::::</p>
                    <p>お届け予定日：{{ $shipping_date }}</p>
                </div>
                {{-- <a href="{{ route('register.edit', ['id'=>$login_user->id]) }}">配送先情報の変更</a> --}}
                <a href="{{ route('cart.paymentinfo') }}">決済情報のご入力</a>
          </nav>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
