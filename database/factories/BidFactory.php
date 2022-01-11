<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\User;
use App\Item;
use App\Bid;


class BidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Bid::class;

    public function definition()
    {
        $file = UploadedFile::fake()->image('profile.jpg', 500, 500);     
        $ext = $file->guessExtension();
        $fileName = Str::random(32).'.'.$ext;
        $target_path = public_path('/users/');
        //ファイルをpublic/uploadフォルダに移動
        $file->move($target_path,$fileName);
        return [

            'message' =>$this->faker->sentence(15),
            'max_price' => $this->faker->numberBetween(10000,999999),
            'payment' => $this->faker->numberBetween(1,2),
            'bid_time' => $this->faker->dateTimeBetween($startDate = '-2 week', $endDate = 'now')->format('Y-m-d H:i:s'),
            'user_id' => function(){
                return User::all()->random();
            },
            'item_id' => function(){
                return Item::all()->random();
            }
        ];
    }
}
