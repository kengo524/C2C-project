<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CashPaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 11; $i++){
            $user_id =  rand(1,3);
            $payment_amount = rand(1000,50000);
            DB::table('cash_payments')->insert([
                'user_id' => $user_id,
                'payment_amount' => $payment_amount,
                'name' => "テストユーザー${i}",
                'bank_name' => "第${i}銀行",
                'branch_name' => "第${i}支店",
                'bank_number' => "${i}${i}00000",
                'type' => "普通",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
