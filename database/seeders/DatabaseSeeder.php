<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\User;
use App\Bid;
use App\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(30)->create();
        Item::factory(50)->create();
        Bid::factory(100)->create();
        // $this->call(UserTableSeeder::class);
        // $this->call(ItemTableSeeder::class);
        // $this->call(BidTableSeeder::class);
    }
}
