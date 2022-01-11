<?php

use Illuminate\Database\Seeder;

class BidTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bid = factory(App\Bid::class, 30)->create();
        // ->each(function($bid){
        //     factory(App\Item::class)->create([
        //         'id' => $bid->item_id,
        //         'user_id' => function(){
        //             return factory(App\User::class)->create()->id;
        //         }]);
        // });
    }
}
