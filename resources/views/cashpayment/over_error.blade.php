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
            <div class="panel-heading">ご注意！</div>
            <div class="panel-body">
              <p>誠に申し訳ございませんが、引出可能金額以上の出金は出来ません。</p>
              <p>大変恐れ入りますが、一度マイページへお戻りください。</p>
            </div>
            <a href="{{ route('mypage') }}">マイページへ</a>
          </nav>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
