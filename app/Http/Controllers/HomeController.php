<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\ItemCategory;

class HomeController extends Controller
{
    public function index(){
        $items = Item::get();
        $categories = ItemCategory::get();

        return view('home.index', compact('items','categories'));
    }
}
