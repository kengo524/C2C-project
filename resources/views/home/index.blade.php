<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>order_details</title>
    </head>
    <body>
      <div>ここはホームページ</div>
      @auth
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">ログアウト</button>
      </form>
      <form method="GET" action="{{ route('mypage') }}">
        <button type="submit">マイページへ</button>
      </form>
      <form method="GET" action="{{ route('cart.cartlist') }}">
        <button type="submit">カート</button>
      </form>
      @endauth

      @guest
      <form method="GET" action="{{ route('login') }}">
        <button type="submit">ログイン</button>
      </form>
      @endguest

      <form>
        <div>
          <input type="search" name="search"  value="{{request('search')}}" placeholder="キーワードを入力" aria-label="検索...">
        </div>
        <input type="submit" value="検索" class="btn btn-info">
      </form>

      {{-- <form action="{{route('homepage')}}">
        <button type="submit" name="sort" value="1">新着順</button>
        <button type="submit" name="sort" value="">あいうえお順</button>
      </form> --}}

      @foreach($items as $item)
      <a href="{{ route('item_detail',[ 'id' => $item->id]) }}">
        <img class="logo" src="{{ asset("storage/items/{$item->id}/sample1.jpg") }}" width="100" height="100"><br>
        出品者ID:{{$item->user_id}}<br>
        カテゴリ:{{$categories[$item->category_id]->name}}<br>
        名前:{{$item->name}}<br>
        値段:{{$item->price}}<br>
        送料:{{$item->shipping_const}}<br>
      </a>
      <br>
      @endforeach
      <div>
        {{ $items->links('vendor.pagination.default') }}
      </div>
      <a href="{{ route('homepage') }}">戻る</a>
    </body>
</html>
