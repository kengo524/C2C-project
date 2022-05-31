<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>complete_orders</title>
    </head>
    <body>
      <p>出品者に商品到着の旨を連絡しました。</p>
      <p>またのご利用お待ちしております！</p>
      <a href="{{ route('mypage') }}">マイページへ</a>
    </body>
</html>
