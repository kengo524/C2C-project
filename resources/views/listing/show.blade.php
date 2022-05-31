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
                        <div class="panel-heading">出品商品詳細</div>
                        <div class="panel-body">
                            <div style="width: 100%; height: 150px;">
                                <img class="logo" src="{{ asset("storage/items/{$item_detail->id}/sample1.jpg") }}" width="auto" height="100%" style="display: block; margin: auto;"><br>
                            </div>
                            <p>商品名:{{$item_detail->name}}</p>
                            <p>金額:{{$item_detail->price}}円</p>
                            <div style="padding-bottom: 5px">
                                在庫数:残り{{$item_detail->stock_quantity}}個
                            </div>
                            @if($item_detail->stock_quantity == 0)
                            <div style="padding-bottom: 5px; color: red">
                                <p>売り切れ！！</p>
                                @if($item_detail->status == 1)
                                <p>※商品非公開のご設定をお願いします。</p>
                                @endif
                            </div>
                            @endif
                            <a href="{{ route('list.edit', ['id'=>$item_detail->id]) }}">編集</a>
                            <p>(カートに商品がない場合のみ変更可能です。)</p>
                            {{-- <a href="{{ route('list.delete', ['id'=>$item_detail->id]) }}">削除</a> --}}
                            <a href="{{ route('listing') }}">出品履歴一覧へ戻る</a>
                        </div>
                    </nav>
                </div>
              </div>
            </div>
          </main>
    </body>
</html>
