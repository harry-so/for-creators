<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = factory(App\Item::class, 30)->create();
        // ->each(function($item){
        //     factory(App\Bid::class)->create([
        //         'item_id' => $item->id,
        //         'user_id' => function(){
        //             return factory(App\User::class)->create()->id;
        //         }]);
        // });
    }
}
