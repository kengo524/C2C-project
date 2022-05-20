<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>mypage</title>
    </head>
    <body>
      <div>ここはマイページ</div>
      <a href="{{ route('mypage') }}">トップページへ</a>
      <a href="{{ route('mypage') }}">新規出品</a>
      <a href="{{ route('orders') }}">購入履歴</a>
      <a href="{{ route('mypage') }}">出品履歴</a>
      <a href="{{ route('mypage') }}">出金</a>
      <a href="{{ route('register.edit', ['id'=>$user->id]) }}">ユーザー情報変更</a>
    </body>
</html>
