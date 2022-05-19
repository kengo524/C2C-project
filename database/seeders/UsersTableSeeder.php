<?php

namespace Database\Seeders;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 4; $i++){
            DB::table('users')->insert([
                'name' => "test_user_${i}",
                'email' => "test_user_${i}@email.com",
                'password' => Hash::make("ssssssss"),
                'phone_number' => "000-0000-0000",
                'postal_code' => "000-0000",
                'address' => "東京都恵比寿${i}丁目${i}－${i}",
                'nick_name' => "test_user_${i}くん",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
