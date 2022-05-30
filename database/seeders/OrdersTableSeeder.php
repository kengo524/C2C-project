<?php

namespace Database\Seeders;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++){
            $user_id =  rand(1,3);
            $price = rand(1000,50000);
            $num = rand(6,10);
            DB::table('orders')->insert([
                'user_id' => $user_id,
                'price' => $price,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'shipping_name' => "ss.brother${i}",
                'postal_code' => "1234567",
                'address' => "兵庫県神戸市灘区${i}-${i}",
                'phone_number' => "08011112222",
                'shipping_date' => Carbon::now()->addDay($num),
            ]);
        }
    }
}
