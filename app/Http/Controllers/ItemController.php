<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemCategory;

class ItemController extends Controller
{
    public function itemDetail($id){

        $item = Item::find($id);
        $categories = ItemCategory::get();

        return view('item.detail',compact('item','categories'));
    }
}
