<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
              <div class="col-12">
                <h5>マイページ</h5>
                <form method="GET" action="{{ route('homepage') }}">
                <button type="submit">トップページへ</button>
                </form><br>
                <form method="GET" action="{{ route('item.create') }}">
                    <button type="submit">新規出品</button>
                </form><br>
                <form method="GET" action="{{ route('orders.index') }}">
                    <button type="submit">購入履歴</button>
                </form><br>
                <form method="GET" action="{{ route('listing') }}">
                    <button type="submit">出品履歴</button>
                </form><br>
                <form method="GET" action="{{ route('listing-sold.index') }}">
                    <button type="submit">成約済み商品一覧</button>
                </form><br>
                <form method="GET" action="{{ route('cashpayment.new') }}">
                    <button type="submit">出金</button>
                </form><br>
                <form method="GET" action="{{ route('register.edit', ['id'=>$user->id]) }}">
                    <button type="submit">ユーザ情報変更</button>
                </form>
              </div>
            </div>
        </div>
    </body>
</html>
