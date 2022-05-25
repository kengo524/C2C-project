<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>C2C App</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>order_details</title>
    </head>
    <body>
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif
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
        <form action="{{ route('cart.add') }}" method="post">
            @csrf
            <input type="hidden" class="form-control" name="item_id" id="item_id" value="{{ $item->id }}" />
            <div class="form-group">
                <label for="quantity">数量</label>
                <select name="quantity">
                    @for($quantity=1; $quantity<=$item->stock_quantity; $quantity++)
                        <option value="{{ $quantity }}">{{ $quantity }}</option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="btn btn-primary">カートに追加</button>
        </form>
        <a href="{{ route('homepage') }}">戻る</a>
    </body>
</html>
