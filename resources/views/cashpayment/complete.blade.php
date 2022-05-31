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
            <div class="panel-heading">完了画面</div>
            <div class="panel-body">
                <p>出金申請が完了しました。</p>
                <p>※資金の入金は2~3営業日以内に行われます。</p>
                <p>ありがとうございました。</p>
            </div>
            <a href="{{ route('mypage') }}">マイページへ</a>
          </nav>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
