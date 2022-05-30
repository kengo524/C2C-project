<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
                        <div class="panel-heading">商品情報詳細</div>
                        <div class="panel-body">
                @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                {{-- <p>商品ID:{{$item->id}}</p> --}}
                <div style="width: 100%; height: 150px;">
                <img class="logo" src="{{ asset("storage/items/{$item->id}/sample1.jpg") }}" width="auto" height="100%" style="display: block; margin: auto;"><br>
                </div>
                {{-- ユーザID:{{$item->user_id}}<br> --}}
                {{-- カテゴリID:{{$item->category_id}}<br> --}}
                <p>商品カテゴリ:{{$categories[$item->category_id]->name}}</p>
                <p>商品名:{{$item->name}}</p>
                <p>説明:{{$item->explanation}}</p>
                <p>価格:￥{{$item->price}}</p>
                <p>在庫:{{$item->stock_quantity}}個</p>
                <p>送料:￥{{$item->shipping_const}}</p>
                <p>商品掲載日:{{$item->updated_at}}</p>
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
                    <div class="text-right">
                    <button type="submit" class="btn btn-primary">カートに追加</button>
                    </div>
                </form>
                <a href="{{ route('homepage') }}">戻る</a>
                        </div>
                    </nav>
            </div>
        </div>
      </div>
    </main>
    </body>
</html>
