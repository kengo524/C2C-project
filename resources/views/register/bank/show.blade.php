<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>editbankregister</title>
    </head>
    <body>
      <div>口座情報</div>
      <form method="POST" action="{{ route('register.bank.edited', ['id'=>$user->id]) }}">
        @csrf
        <p>口座名義人:</p>
        <input type="text" class="form-control" name="name" id="name" value="{{ $bank_account['name'] }}">
        <p>銀行名:</p>
        <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{ $bank_account['bank_name'] }}">
        <p>支店名:</p>
        <input type="text" class="form-control" name="branch_name" id="branch_name" value="{{ $bank_account['branch_name'] }}" >
        <p>預金種別:</p>
        <input type="text" class="form-control" name="type" id="type" value="{{ $bank_account['type'] }}">
        <p>口座番号:</p>
        <input type="text" class="form-control" name="bank_number" id="bank_number" value="{{ $bank_account['bank_number'] }}">
        <input type="submit" value="変更する">
      </form>
      <a href="{{ route('mypage') }}">マイページへ戻る</a>
    </body>
</html>
