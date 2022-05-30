<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>complete_listing_sold</title>
    </head>
    <body>
      <div>配送ありがとうございます！</div>
      <a href="{{ route('listing-sold.show', ['id'=>$order_detail['item_id']]) }}">成約済み商品詳細へ戻る</a>
    </body>
</html>
