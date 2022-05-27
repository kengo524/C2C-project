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
            <div class="panel-heading">決済情報入力</div>
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                @endforeach
            </div>
            @endif
            <form action="{{ route('cart.confirm') }}" method="post">
                @csrf
                <input type="hidden" class="form-control" name="shipping_date" id="shipping_date" value="{{ $request['shipping_date'] }}" />
                <div class="form-group">
                <label for="name">カード名義</label>
                <p>半角英字（例:KENGO KONISHI）</p>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" />
                </div>
                <div class="form-group">
                    <label for="number">カード番号</label>
                    <p>半角英数字（例:1234567890123456）</p>
                    <input type="text" class="" name="number1" id="number1" value="{{ old('number1') }}" />-
                    <input type="text" class="" name="number2" id="number2" value="{{ old('number2') }}" />-
                    <input type="text" class="" name="number3" id="number3" value="{{ old('number3') }}" />-
                    <input type="text" class="" name="number4" id="number4" value="{{ old('number4') }}" />
                </div>
                <div class="form-group">
                    <label for="card_brand">カード会社</label>
                    <select name="card_brand">
                        @foreach ($card_brands as $card_brand)
                        <option value="{{ $card_brand }}">{{ $card_brand }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="due_date">有効期限</label>
                    <p>カードの有効期限は"月(2桁)/年(2桁)でカード表面に記載されています。"</p>
                    <input type="text" class="" name="due_date1" id="due_date1" value="{{ old('due_date1') }}" />月/
                    <input type="text" class="" name="due_date2" id="due_date2" value="{{ old('due_date2') }}" />年
                </div>
                <div class="form-group">
                    <label for="cord">セキュリティコード</label>
                    <p>半角数字(例999)</p>
                    <input type="text" class="" name="cord" id="cord" value="{{ old('cord') }}"/>
                </div>
                <div class="text-right">
                <button type="submit" class="btn btn-primary">次へ（確認画面）</button>
                </div>
                <div>
                    <button type="button" onClick="history.back()">戻る</button>
                </div>
            </form>
          </nav>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
