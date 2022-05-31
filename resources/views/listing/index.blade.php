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
          <div class="container">
            <div class="row">
                <h5>出品商品一覧</h5>
                <div class="col-12">
                    <div style="display: flex; flex-wrap: wrap;">
                        @foreach($items as $item)
                        <div style="width:23%;box-sizing: border-box; margin:20px 1%; border: solid 2px gray; border-radius: 5px;">
                            <a href="{{ route('list', ['id'=>$item->id]) }}" style="text-decoration: none; color:gray">
                                <div style="width: 100%; height: 200px;">
                                    <img class="logo" src="{{ asset("storage/items/{$item->id}/sample1.jpg") }}" width="auto" height="100%"  style="display: block; margin: auto;">
                                </div>
                                <div style="padding-bottom: 5px">
                                    {{$item->name}}
                                </div>
                                <div style="padding-bottom: 5px">
                                    出品単価:{{$item->price}}円
                                </div>
                                @if($item->stock_quantity == 0)
                                <div style="padding-bottom: 5px; color: red">
                                    <p>売り切れ！！</p>
                                    @if($item->status == 1)
                                    <p>※商品非公開のご設定をお願いします。</p>
                                    @endif
                                </div>
                                @else
                                <div style="padding-bottom: 5px">
                                    在庫数:残り{{$item->stock_quantity}}個
                                </div>
                                @endif
                            </a>
                        </div>
                        @endforeach
                     </div>
                    <a href="{{ route('mypage') }}">マイページへ戻る</a>
                </div>
            </div>
        </div>
    </body>
</html>
