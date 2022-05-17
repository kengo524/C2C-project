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
        DB::table('shipping_addresses')->insert([
            'user_id' => 1,
            'name' => "ss.brother",
            'postal_code' => 5555555,
            'address' => "兵庫県神戸市灘区1-1",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
