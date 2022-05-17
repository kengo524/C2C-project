<?php

namespace Database\Seeders;

use App\Models\ItemCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([UsersTableSeeder::class,]);
        $this->call([BankAccountSeeder::class,]);
        $this->call([ItemCategoryTableSeeder::class,]);
        $this->call([ItemTableSeeder::class,]);
        $this->call([OrdersTableSeeder::class,]);

    }
}
