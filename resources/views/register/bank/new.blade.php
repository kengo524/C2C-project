@extends('layouts.form')

@section('form')
<nav class="panel panel-default">
    <div class="panel-heading">銀行口座情報を登録する</div>
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
      <p>※ご出品された商品の売上代金のご入金を行う際の入金口座のご登録です。</p>
      <form method="POST" action="{{ route('register.bank.create', ['id'=>$user->id]) }}">
        @csrf
        <div class="form-group">
            <label for="name">口座名義人:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="name">銀行名:</label>
            <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{ old('bank_name') }}">
        </div>
        <div class="form-group">
            <label for="name">支店名:</label>
            <input type="text" class="form-control" name="branch_name" id="branch_name" value="{{ old('branch_name') }}" >
        </div>
        <div class="form-group">
            <label for="name">預金種別:</label>
            <select name="type">
                <option value="普通">普通</option>
                <option value="当座">当座</option>
                <option value="貯蓄">貯蓄</option>
            </select>
        </div>
        <div class="form-group">
            <label for="name">口座番号:</label>
            <input type="text" class="form-control" name="bank_number" id="bank_number" value="{{ old('bank_number') }}">
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
