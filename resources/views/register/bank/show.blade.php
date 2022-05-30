@extends('layouts.form')

@section('form')
<nav class="panel panel-default">
    <div class="panel-heading">銀行口座情報を変更する</div>
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
      <p>ご登録の売上代金の入金口座の変更ができます。</p>
      <form method="POST" action="{{ route('register.bank.edited', ['id'=>$user->id]) }}">
        @csrf
        <div class="form-group">
            <label for="name">口座名義人:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $bank_account['name'] }}">
        </div>
        <div class="form-group">
            <label for="name">銀行名:</label>
            <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{ $bank_account['bank_name'] }}">
        </div>
        <div class="form-group">
            <label for="name">支店名:</label>
            <input type="text" class="form-control" name="branch_name" id="branch_name" value="{{ $bank_account['branch_name'] }}" >
        </div>
        <div class="form-group">
            <label for="name">預金種別:</label>
            <input type="text" class="form-control" name="type" id="type" value="{{ $bank_account['type'] }}">
        </div>
        <div class="form-group">
            <label for="name">口座番号:</label>
            <input type="text" class="form-control" name="bank_number" id="bank_number" value="{{ $bank_account['bank_number'] }}">
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
