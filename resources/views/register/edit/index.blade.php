<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>registeredit</title>
    </head>
    <body>
      <div>ここはユーザ情報変更ページ</div>
      <a href="{{ route('register.users.edit', ['id'=>$user->id]) }}">基本情報変更</a>
      <a href="{{ route('register.bank.edit', ['id'=>$user->id]) }}">口座情報変更 / 新規登録</a>
      <a href="{{ route('register.shippingaddress.edit', ['id'=>$user->id]) }}">お届け先情報変更 / 新規登録</a>
      <a href="{{ route('mypage') }}">マイページへ戻る</a>
    </body>
</html>
