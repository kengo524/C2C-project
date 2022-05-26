<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>editshippingaddressregister</title>
    </head>
    <body>
        @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	    @endif
      <div>お届け先情報</div>
      <p>お手数ですが、こちらで商品のお届け先のご住所のご登録をお願いいたします。</p>
      <form method="POST" action="{{ route('register.shippingaddress.create') }}">
        @csrf
        <p>郵便番号:</p>
        <p>ハイフンなしで入力してください</p>
        <input type="text" class="form-control" name="postal_code" id="postal_code" value="{{ old('postal_code') }}">
        <p>住所:</p>
        <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
        <p>電話番号:</p>
        <p>ハイフンなしで入力してください</p>
        <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" >
        <p>氏名:</p>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        <div class="text-right">
            <button type="submit" class="btn btn-primary">登録する</button>
        </div>
      </form>
      <a href="{{ route('mypage') }}">マイページへ戻る</a>
    </body>
</html>
