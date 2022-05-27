<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>listing_details</title>
    </head>
    <body>
      <div>成約済み商品詳細ページ</div>
      @foreach($constracted_lists as $constracted_list)
        <p>{{$constracted_list['item_image']}}</p>
        <p>商品名:{{$constracted_list['item_name']}}</p>
        <p>金額:{{$constracted_list['item_price']}}円</p>
        <p>注文日:{{$constracted_list['order_date']}}</p>
        <p>購入者氏名:{{$constracted_list['shipping_name']}}</p>
        <p>配送先:{{$constracted_list['shipping_address']}}</p>
        <p>電話番号:{{$constracted_list['shipping_phone_number']}}</p>
        <p>状態:</p>
            {{--もしstatusが1だったら変更画面へ--}}
            @if($constracted_list['order_status'] == 1)
                <p>{{\App\Models\OrderDetail::STATUS[$constracted_list['order_status']]['label']}}</p>
                <a href="{{ route('listing-sold.edit', ['order_detail_id'=>$constracted_list['order_detail_id']]) }}">商品状態変更</a>
             @else
                {{--もしstatusが1以外だったら<p>タグで表示するだけ--}}
                <p>{{\App\Models\OrderDetail::STATUS[$constracted_list['order_status']]['label']}}</p>
            @endif
        <br>
        -------------------------------------------
        @endforeach
      <br>
      <a href="{{ route('listing-sold.index') }}">成約済み商品一覧へ戻る</a>
    </body>
</html>
