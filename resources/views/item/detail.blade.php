<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>order_details</title>
    </head>
    <body>
      <div>ここは商品詳細ページ</div>
        商品ID:{{$item->id}}<br>
        ユーザID:{{$item->user_id}}<br>
        カテゴリID:{{$item->category_id}}<br>
        カテゴリ名:{{$categories[$item->category_id]->name}}<br>
        説明:{{$item->explanation}}<br>
        名前:{{$item->name}}<br>
        値段:{{$item->price}}<br>
        画像:{{$item->image}}<br>
        在庫:{{$item->stock_quantity}}<br>
        送料:{{$item->shipping_const}}<br>
        更新日:{{$item->updated_at}}<br>
      <a href="{{ route('homepage') }}">戻る</a>
      <form action="">
        <input type="text">
        <button type="submit">カートに追加</button>
      </form>
    </body>
</html>
