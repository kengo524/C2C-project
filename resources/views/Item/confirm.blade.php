<!DOCTYPE html>
<html lang="ja">
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
            <div class="panel-heading">確認画面</div>
            <div class="panel-body">
              <form action="{{ route('item.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image">商品画像:</label>
                    <img src="data:image/jpg;base64, {{ $imageText }}" width="200" height="200">
                    {{-- <p>{{ $image }}</p> --}}
                        {{-- @foreach($images as $ image)
                            <img src"{{ Storage::url($image->image) }}">
                        @endforeach --}}
                    <input type="hidden" class="form-control" name="image" id="image" value="{{ $request['image'] }}"/>
                </div>
                <div class="form-group">
                  <label for="name">商品名:</label>
                  <p>{{ $request['name'] }}</p>
                  <input type="hidden" class="form-control" name="name" id="name" value="{{ $request['name'] }}" />
                </div>
                <div class="form-group">
                    <label for="explanation">商品説明:</label>
                    <p>{{ $request['explanation'] }}</p>
                    <input type="hidden" class="form-control" name="explanation" id="explanation" value="{{ $request['explanation'] }}" />
                </div>
                <div class="form-group">
                    <label for="item_category_id">商品カテゴリ:</label>
                    <p>{{ $item_category_name }}</p>
                    <input type="hidden" class="form-control" name="item_category_id" id="item_category_id" value="{{ $request['item_category_id'] }}" />
                </div>
                <div class="form-group">
                    <label for="price">販売価格:</label>
                    <p>{{ $request['price'] }}円</p>
                    <input type="hidden" class="form-control" name="price" id="price" value="{{ $request['price'] }}" />
                </div>
                <div class="form-group">
                    <label for="stock_quantity">在庫数:</label>
                    <p>{{ $request['stock_quantity'] }}</p>
                    <input type="hidden" class="form-control" name="stock_quantity" id="stock_quantity" value="{{ $request['stock_quantity'] }}"/>
                </div>
                <div class="form-group">
                    <label for="shipping_const">送料:</label>
                    <p>{{ $request['shipping_const'] }}円</p>
                    <input type="hidden" class="form-control" name="shipping_const" id="shipping_const" value="{{ $request['shipping_const'] }}"/>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">出品登録へ</button>
                </div>
                <div>
                    <button type="button" onClick="history.back()">戻る</button>
                </div>
              </form>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
