<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>editbankregister</title>
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
      <div>口座情報</div>
      <p>※ご出品された商品の売上代金のご入金を行う際の入金口座のご登録です。</p>
      <form method="POST" action="{{ route('register.bank.create', ['id'=>$user->id]) }}">
        @csrf
        <p>口座名義人:</p>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        <p>銀行名:</p>
        <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{ old('bank_name') }}">
        <p>支店名:</p>
        <input type="text" class="form-control" name="branch_name" id="branch_name" value="{{ old('branch_name') }}" >
        <p>預金種別:</p>
        <select name="type">
            <option value="普通">普通</option>
            <option value="当座">当座</option>
            <option value="貯蓄">貯蓄</option>
        </select>
        <p>口座番号:</p>
        <input type="text" class="form-control" name="bank_number" id="bank_number" value="{{ old('bank_number') }}">
        <div class="text-right">
            <button type="submit" class="btn btn-primary">登録する</button>
        </div>
      </form>
      <a href="{{ route('mypage') }}">マイページへ戻る</a>
    </body>
</html>
