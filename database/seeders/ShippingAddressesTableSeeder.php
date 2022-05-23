<?php

namespace Database\Seeders;

use App\Models\ShippingAddress;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 3; $i++){
            DB::table('shipping_addresses')->insert([
                'user_id' => $i,
                'name' => "ss.brother",
                'postal_code' => 5555555,
                'address' => "兵庫県神戸市灘区${i}-${i}",
                'phone_number' => "000-0000-0000",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
