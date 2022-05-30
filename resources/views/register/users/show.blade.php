@extends('layouts.form')

@section('form')
<nav class="panel panel-default">
    <div class="panel-heading">基本情報を変更する</div>
    <div class="panel-body">
        @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	    @endif
        <p>氏名：{{ $user['name'] }}</p>
      <form method="POST" action="{{ route('register.users.edited', ['id'=>$user->id]) }}">
        @csrf
        <div class="form-group">
            <label for="name">ニックネーム：</label>
            <input type="text" class="form-control" name="nick_name" id="nick_name" value="{{ $user['nick_name'] }}">
        </div>
        <div class="form-group">
            <label for="name">メールアドレス:</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $user['email'] }}">
        </div>
        <div class="form-group">
            <label for="name">パスワード:</label>
            <input type="text" class="form-control" name="password" id="password" >
        </div>
        <div class="form-group">
            <label for="name">電話番号:</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $user['phone_number'] }}">
        </div>
        <div class="form-group">
            <label for="name">郵便番号:</label>
            <p>ハイフンなしで入力してください</p>
            <input type="text" class="form-control" name="postal_code" id="postal_code" value="{{ $user['postal_code'] }}">
        </div>
        <div class="form-group">
            <label for="name">住所:</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $user['address'] }}">
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">変更する</button>
          </div>
          <div>
            <a href="{{ route('mypage') }}">マイページへ戻る</a>
          </div>
    </div>
</nav>
@endsection


