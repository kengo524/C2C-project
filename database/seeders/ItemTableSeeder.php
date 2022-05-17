<?php

namespace Database\Seeders;

use Carbon\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use App\Models\Item;
use App\Models\ItemCategory;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $item = Item::
        // $category = ItemCategory();

        DB::table('items')->insert([
            'name' => "test_category",
            'user_id' => 1,
            'category_id' => 1,
            'name' => "testItem",
            'explanation' => "testItemです。",
            'price' => 100,
            'image' => "src",
            'stock_quantity' => 3,
            'shipping_const' => 100,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
