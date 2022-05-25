<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>edit_listing_detail</title>
    </head>
    <body>
        {{-- @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	    @endif --}}
      <div>出品履歴詳細編集</div>
      {{-- @foreach($item_details as $item_detail) --}}
      <form method="POST" action="{{ route('list.edited', ['id'=>$item_detail->id]) }}">
        @csrf
        <p>商品名:</p>
        <input type="text" class="form-control" name="name" id="name" value="{{ $item_detail['name'] }}">
        <p>金額:</p>
        <input type="text" class="form-control" name="price" id="price" value="{{ $item_detail['price'] }}">
        <p>在庫数:</p>
        <input type="text" class="form-control" name="stock_quantity" id="stock_quantity" value="{{ $item_detail['stock_quantity'] }}">
        <p>状態:</p>
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
        <input type="submit" value="変更する"><br>
      </form>
      {{-- @endforeach --}}
      <a href="{{ route('mypage') }}">マイページへ戻る</a>
    </body>
</html>
