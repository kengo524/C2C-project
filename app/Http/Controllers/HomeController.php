<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\ItemCategory;

class HomeController extends Controller
{
    public function index(Request $request){
        $categories = ItemCategory::get();
        $search = $request->input('search');
        // クエリビルダ
        $query = Item::query();

       // もし検索フォームにキーワードが入力されたら
        if ($search) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');
            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('name', 'like', "%{$value}%")->orWhere('explanation','like',"%{$value}%");
            }
            // 上記で取得した$queryをページネートにし、変数$itemsに代入
            $items = $query->paginate(20);
        }
        else{
            $items = Item::paginate(20);
        }

        return view('home.index', compact('items','categories'));
    }
}
