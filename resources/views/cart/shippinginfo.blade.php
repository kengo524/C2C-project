<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>C2C App</title>
  <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
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
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                @endforeach
            </div>
            @endif
                <div>
                    <p>氏名：{{ $shipping_address->name }}</p>
                    <p>郵便番号：{{ $shipping_address->postal_code }}</p>
                    <p>住所：{{ $shipping_address->address }}</p>
                    <p>電話番号：{{ $shipping_address->phone_number }}</p>
                </div>
                <p><a href="{{ route('register.shippingaddress.edit', ['id'=>$user->id]) }}">配送先情報の変更</a></p>
                <p>(配送先変更される場合は、マイページからユーザー情報変更をお願いいたします。)</p>
                <div>
                    <p>:::::::::::::::::::::::::</p>
                    <form action="{{ route('cart.paymentinfo') }}" method="POST">
                        @csrf
                    <div class="form-group">
                        <label for="due_date">お届け予定日のご選択</label>
                        <input type="text" class="form-control" name="shipping_date" id="shipping_date" value="{{ old('shipping_date') }}" />
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">決済情報のご入力へ</button>
                      </div>
                    </form>
                </div>
          </nav>
        </div>
      </div>
    </div>
  </main>

<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
<script>
  flatpickr(document.getElementById('shipping_date'), {
    locale: 'ja',
    dateFormat: "Y/m/d",
    minDate: new Date().fp_incr(6),
    maxDate: new Date().fp_incr(90)
  });
</script>
</body>
</html>
