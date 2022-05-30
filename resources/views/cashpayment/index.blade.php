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
            <div class="panel-heading">出金履歴一覧</div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">日付</th>
                          <th scope="col">出金金額</th>
                          <th scope="col">銀行名</th>
                          <th scope="col">支店名</th>
                          <th scope="col">口座番号</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($cashpayment_history as $cashpayment_data)
                            <tr>
                                <th scope="row"></th>
                                <td>{{ $cashpayment_data->formatted_created_at }}</td>
                                <td>{{ $cashpayment_data->payment_amount }}円</td>
                                <td>{{ $cashpayment_data->bank_name }}</td>
                                <td>{{ $cashpayment_data->branch_name }}</td>
                                <td>{{ $cashpayment_data->bank_number }}</td>
                            </tr>
                        @endforeach
                      </tbody>
                </table>

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
