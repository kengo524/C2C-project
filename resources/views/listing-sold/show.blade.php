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
        <div class="container">
            <div class="row">
                <h5>購入者一覧</h5>
                    <div class="col-12">
                        <div style="display: flex; flex-wrap: wrap;">
                        @foreach($constracted_lists as $constracted_list)
                        <div style="width:23%;box-sizing: border-box; margin:20px 1%; border: solid 2px gray; border-radius: 5px;">
                            {{-- <p>商品名:{{$constracted_list['item_name']}}</p> --}}
                            <div style="padding-bottom: 5px">
                                注文日:{{$constracted_list['order_date']}}
                            </div>
                            <div style="padding-bottom: 5px">
                                購入数量:{{$constracted_list['quantity']}}
                            </div>
                            <div style="padding-bottom: 5px">
                                購入者氏名:{{$constracted_list['shipping_name']}}
                            </div>
                            <div style="padding-bottom: 5px">
                                配送先:{{$constracted_list['shipping_address']}}
                            </div>
                            <div style="padding-bottom: 5px">
                                電話番号:{{$constracted_list['shipping_phone_number']}}
                            </div>
                            <div style="padding-bottom: 5px">
                                状態:
                                {{--もしstatusが1だったら変更画面へ--}}
                                @if($constracted_list['order_status'] == 1)
                                    <p>{{\App\Models\OrderDetail::STATUS[$constracted_list['order_status']]['label']}}</p>
                                    <a href="{{ route('listing-sold.edit', ['order_detail_id'=>$constracted_list['order_detail_id']]) }}">商品状態変更</a>
                                @else
                                    {{--もしstatusが1以外だったら<p>タグで表示するだけ--}}
                                    <p>{{\App\Models\OrderDetail::STATUS[$constracted_list['order_status']]['label']}}</p>
                                @endif
                            </div>
                            <br>
                        </div>
                            @endforeach
                        <br>
                </div>
                <a href="{{ route('listing-sold.index') }}">成約済み商品一覧へ戻る</a>
                <a href="{{ route('mypage') }}">マイページへ戻る</a>
            </div>
        </div>
    </body>
</html>
