<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>editshippingaddressregister</title>
    </head>
    <body>
      <div>お届け先情報</div>
      <form method="POST" action="{{ route('register.shippingaddress.edited', ['id'=>$user->id]) }}">
        @csrf
        <p>郵便番号:</p>
        <input type="text" class="form-control" name="postal_code" id="postal_code" value="{{ $shipping_address['postal_code'] }}">
        <p>住所:</p>
        <input type="text" class="form-control" name="address" id="address" value="{{ $shipping_address['address'] }}">
        <p>電話番号:</p>
        <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $user['phone_number'] }}" >
        <p>氏名:</p>
        <input type="text" class="form-control" name="name" id="name" value="{{ $shipping_address['name'] }}">
        <input type="submit" value="変更する">
      </form>
      <a href="{{ route('mypage') }}">マイページへ戻る</a>
    </body>
</html>
