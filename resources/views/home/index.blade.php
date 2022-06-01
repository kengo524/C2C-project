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
          <div class="col-12">
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
              <form method="GET" action="{{ route('register') }}">
                <button type="submit">新規会員登録はこちら</button>
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
          </div>
          <div class="col-12">
            <div style="display: flex; flex-wrap: wrap;">
              @foreach($items as $item)
              <div style="width:23%;box-sizing: border-box; margin:20px 1%; border: solid 2px gray; border-radius: 5px;">
                <a href="{{ route('item_detail',[ 'id' => $item->id]) }}" style="text-decoration: none; color:gray">
                  <div style="width: 100%; height: 200px;">
                    <img class="logo" src="{{ asset("storage/items/{$item->id}/sample1.jpg") }}" width="auto" height="100%"  style="display: block; margin: auto;">
                  </div>
                  <div style="padding: 10px;">
                    <!-- <div style="padding-bottom: 5px">
                      出品者ID:{{$item->user_id}}
                    </div> -->
                    <div style="padding-bottom: 5px">
                      {{$item->name}}
                    </div>
                    <div style="padding-bottom: 5px">
                      ￥{{$item->price}}
                    </div>
                    <div style="padding-bottom: 5px">
                      送料:￥{{$item->shipping_const}}
                    </div>
                    <div style="padding-bottom: 5px">
                      カテゴリ:{{$categories[$item->category_id]->name}}
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
            </div>
          </div>
          {{ $items->appends(request()->query())->links('vendor.pagination.default') }}
              <a href="{{ route('homepage') }}">戻る</a>
        </div>
      </div>
    </body>
</html>
