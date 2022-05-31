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
            <div class="panel-heading">お願い</div>
            <div class="panel-body">
              <p>「商品発送中」に変更いたしました。</p>
              <p>速やかにお客様へのご発送をお願いいたします。</p>
            </div>
            <a href="{{ route('listing-sold.show', ['id'=>$order_detail['item_id']]) }}">成約済み商品詳細へ戻る</a>
          </nav>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
