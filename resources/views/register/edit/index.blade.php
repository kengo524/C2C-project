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
                <h5>ユーザ情報変更</h5>
                <form method="GET" action="{{ route('register.users.edit', ['id'=>$user->id]) }}">
                    <button type="submit">基本情報変更</button>
                </form><br>
                <form method="GET" action="{{ route('register.bank.edit', ['id'=>$user->id]) }}">
                    <button type="submit">口座情報変更 / 新規登録</button>
                </form><br>
                <form method="GET" action="{{ route('register.shippingaddress.edit', ['id'=>$user->id]) }}">
                    <button type="submit">お届け先情報変更 / 新規登録</button>
                </form><br>
                <a href="{{ route('mypage') }}">マイページへ戻る</a>
              </div>
            </div>
          </div>
    </body>
</html>
