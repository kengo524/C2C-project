<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>editusersregister</title>
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
      <div>基本情報</div>
      <form method="POST" action="{{ route('register.users.edited', ['id'=>$user->id]) }}">
        @csrf
        <p>氏名：{{ $user['name'] }}</p>
        <p>ニックネーム:</p>
        <input type="text" class="form-control" name="nick_name" id="nick_name" value="{{ $user['nick_name'] }}">
        <p>メールアドレス:</p>
        <input type="text" class="form-control" name="email" id="email" value="{{ $user['email'] }}">
        <p>パスワード:</p>
        <input type="text" class="form-control" name="password" id="password" >
        {{-- 電話番号追加 --}}
        <p>電話番号:</p>
        <p>ハイフンなしで入力してください</p>
        <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $user['phone_number'] }}">
        <p>郵便番号:</p>
        <p>ハイフンなしで入力してください</p>
        <input type="text" class="form-control" name="postal_code" id="postal_code" value="{{ $user['postal_code'] }}">
        <p>住所:</p>
        <input type="text" class="form-control" name="address" id="address" value="{{ $user['address'] }}">
        <input type="submit" value="変更する">
      </form>
      <a href="{{ route('mypage') }}">マイページへ戻る</a>
    </body>
</html>
