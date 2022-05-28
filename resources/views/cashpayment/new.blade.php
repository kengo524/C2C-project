<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>C2C App</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <header>
    <nav class="my-navbar">
      <a class="my-navbar-brand" href="/">C2C App</a>
    </nav>
  </header>
  <main>
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">出金申請を実施する</div>
            <div class="panel-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
                <button type="button" class="btn btn-primary" onclick="location.href='{{ route('cashpayment.index') }}'">過去の出金履歴一覧</button>
                <div><p>現在の出金可能金額：{{ $user_payable_amount }}円</p></div>

              <form action="{{ route('cashpayment.confirm') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name">出金金額</label>
                  <input type="text" class="form-control" name="payment_amount" id="payment_amount" value="{{ old('payment_amount') }}" />
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">次へ（確認画面）</button>
                </div>
              </form>

               <div>
                    <p>銀行名：{{ $user_bank_info->bank_name }}</p>
                    <p>支店名：{{ $user_bank_info->branch_name }}</p>
                    <p>預金種別：{{ $user_bank_info->type }}</p>
                    <p>口座名義人：{{ $user_bank_info->name }}</p>
                    <p>口座番号：{{ $user_bank_info->bank_number }}</p>
                </div>
                <p><a href="{{ route('register.bank.edit', ['id'=>$user_id]) }}">入金口座情報の変更</a></p>
                <p>(入金口座変更される場合は、マイページからユーザー情報変更をお願いいたします。)</p>
                <div>

              <div>
                <button type="button" onClick="history.back()">戻る</button>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
