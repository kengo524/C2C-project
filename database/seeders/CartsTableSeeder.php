<?php

namespace Database\Seeders;

use Carbon\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


use App\Models\Cart;
use App\Models\Item;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 101; $i++){
            $user_id =  rand(1,3);
            $item_id =  rand(1,100);
            $quantity =  rand(1,3);
            DB::table('carts')->insert([
                'user_id' => $user_id,
                'item_id' => $item_id,
                'quantity' => $quantity,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
