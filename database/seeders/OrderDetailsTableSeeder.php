<?php

namespace Database\Seeders;

use App\Models\OrderDetail;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 100; $i++){
            $price = rand(100,10000);
            $order_id = rand(1,10);
            $item_id = rand(1,50);
            $quantity = rand(1,5);
            DB::table('order_details')->insert([
                'order_id' => $order_id,
                'item_id' => $item_id,
                'quantity' => $quantity,
                'price' => $price,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
