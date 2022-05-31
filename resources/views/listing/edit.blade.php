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
                    <div class="panel-heading">出品商品情報変更</div>
                      <div class="panel-body">
                        <form method="POST" action="{{ route('list.edited', ['id'=>$item_detail->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">商品名</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $item_detail['name'] }}">
                            </div>
                            <div class="form-group">
                                <label for="name">出品金額</label>
                                <input type="text" class="form-control" name="price" id="price" value="{{ $item_detail['price'] }}">
                            </div>
                            <div class="form-group">
                                <label for="name">在庫数</label>
                                <input type="text" class="form-control" name="stock_quantity" id="stock_quantity" value="{{ $item_detail['stock_quantity'] }}">
                            </div>
                            <div class="form-group">
                                <label for="status">状態</label>
                                <select name="status">
                                    @foreach(\App\Models\Item::STATUS as $key => $val)
                                        <option
                                            value="{{ $key }}"
                                            {{ $key == old('status', $item_detail->status) ? 'selected' : '' }}
                                        >
                                        {{ $val['label'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">変更する</button>
                            </div>
                        </form>
                        <a href="{{ route('list', ['id'=>$item_detail->id]) }}">出品商品詳細へ戻る</a>
                      </div>
                    </nav>
                  </div>
                </div>
              </div>
        </main>
    </body>
</html>
