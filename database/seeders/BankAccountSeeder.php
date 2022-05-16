<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\BankAccount;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "bankAccountTest",
            'email' => "bank@email.com",
            'password' => Hash::make("bankTest"),
            'phone_number' => "000-0000-0000",
            'postal_code' => "000-0000",
            'address' => "東京都恵比寿１丁目１－１",
            'nick_name' => "bankくん",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        BankAccount::create([
            'user_id' => $user->id,
            'name' => "テストだよ。",
        ]);
    }
}
