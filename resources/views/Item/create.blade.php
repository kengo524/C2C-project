@extends('layouts.form')

@section('form')
          <nav class="panel panel-default">
            <div class="panel-heading">出品商品を登録する</div>
            <div class="panel-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
              <form action="{{ route('item.confirm') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">商品名</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" />
                </div>
                <div class="form-group">
                    <label for="explanation">商品説明</label>
                    <input type="text" class="form-control" name="explanation" id="explanation" value="{{ old('explanation') }}" />
                </div>
                <div class="form-group">
                    <label for="item_category_id">商品カテゴリ</label>
                    <select name="item_category_id">
                        @foreach ($item_categories as $item_category)
                        <option value="{{ $item_category->id }}">{{ $item_category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">販売価格</label>
                    <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" />
                </div>
                <div class="form-group">
                    <label for="stock_quantity">在庫数</label>
                    <input type="text" class="form-control" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity') }}"/>
                </div>
                <div class="form-group">
                    <label for="shipping_const">送料</label>
                    <input type="text" class="form-control" name="shipping_const" id="shipping_const" value="{{ old('shipping_const') }}"/>
                </div>
                <div class="form-group">
                    <label for="image">商品画像</label>
                    <input type="file" name="image" accept="image/png, image/jpeg" id="image" value="{{ old('image') }}">
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">次へ（確認画面）</button>
                </div>
                <div>
                    <button type="button" onClick="history.back()">戻る</button>
                </div>
              </form>
            </div>
          </nav>
@endsection
