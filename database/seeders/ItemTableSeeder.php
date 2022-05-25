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

        for($i = 1; $i < 101; $i++){
            $user_id =  rand(1,3);
            $category_id =  rand(1,6);
            $price =  rand(100,10000);
            $stock =  rand(1,20);
            $shipping_cost =  rand(10,100);
            $status = rand(1,2);
            DB::table('items')->insert([
                'name' => "test_item_${i}",
                'user_id' => $user_id,
                'category_id' => $category_id,
                'explanation' => "testItem_${i}です。",
                'price' => $price,
                'image' => "src",
                'stock_quantity' => $stock,
                'shipping_const' => $shipping_cost,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'status' => $status,
            ]);
        }
    }
}
