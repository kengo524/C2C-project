<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
                    <div class="panel-heading">配送情報変更</div>
                      <div class="panel-body">
                        <p>{{$constracted_list['item_name']}}</p>
                        <p>注文日:{{$constracted_list['order_date']}}</p>
                        <p>購入数量:{{$constracted_list['quantity']}}</p>
                        <p>購入者氏名:{{$constracted_list['shipping_name']}}</p>
                        <p>配送先:{{$constracted_list['shipping_address']}}</p>
                        <p>電話番号:{{$constracted_list['shipping_phone_number']}}</p>
                        <form method="POST" action="{{ route('listing-sold.complete', ['order_detail_id'=>$constracted_list['order_detail_id']]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="status">状態：</label>
                                <select name="status">
                                    <option value="1"selected='selected'>商品未発送</option>
                                    <option value="2">商品発送中</option>
                                </select>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">変更する</button>
                            </div>
                        </form>
                        <a href="{{ route('listing-sold.index') }}">成約済み商品一覧へ戻る</a>
                    </div>
                </nav>
            </div>
            </div>
        </div>
    </main>
    </body>
</html>
