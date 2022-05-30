@extends('layouts.form')

@section('form')
<nav class="panel panel-default">
    <div class="panel-heading">配送先情報を登録する</div>
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
      <p>お手数ですが、こちらで商品のお届け先のご住所のご登録をお願いいたします。</p>
      <form method="POST" action="{{ route('register.shippingaddress.create') }}">
        @csrf
        <div class="form-group">
            <label for="name">郵便番号:</label>
            <p>ハイフンなしで入力してください</p>
            <input type="text" class="form-control" name="postal_code" id="postal_code" value="{{ old('postal_code') }}">
        </div>
        <div class="form-group">
            <label for="name">住所:</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
        </div>
        <div class="form-group">
            <label for="name">電話番号:</label>
            <p>ハイフンなしで入力してください</p>
            <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" >
        </div>
        <div class="form-group">
            <label for="name">氏名:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>

         <div class="text-right">
            <button type="submit" class="btn btn-primary">変更する</button>
          </div>
        </form>
          <div>
            <a href="{{ route('mypage') }}">マイページへ戻る</a>
          </div>
    </div>
</nav>
@endsection
