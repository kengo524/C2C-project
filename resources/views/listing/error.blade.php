<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>error_listing_detail</title>
    </head>
    <body>
      <div>この商品はカートに入っているため、編集出来ません。</div>
      <a href="{{ route('list', ['id'=>$item_detail->id]) }}">出品履歴へ戻る</a>
    </body>
</html>
