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
        DB::table('users')->insert([
            'name' => "ss",
            'email' => "ss@email.com",
            'password' => Hash::make("ssssssss"),
            'phone_number' => "000-0000-0000",
            'postal_code' => "000-0000",
            'address' => "東京都恵比寿１丁目１－１",
            'nick_name' => "ssくん",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
