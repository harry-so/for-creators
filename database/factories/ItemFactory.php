<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\User;
use App\Item;


class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Item::class;

    public function definition()
    {
        $file = UploadedFile::fake()->image('item.jpg', 500, 500);     
        $ext = $file->guessExtension();
        $fileName = Str::random(32).'.'.$ext;
        $target_path = public_path('/items/');
        //ファイルをpublic/uploadフォルダに移動
        $file->move($target_path,$fileName);
        return [
            'img_1' =>$fileName,
            'item_name' => $this->faker->word(15),
            'min_price' => $this->faker->numberBetween(10000,100000),
            'item_desc' => $this->faker->realText(50),
            'published' => now(),
            'duration' => $this->faker->numberBetween(1,4),
            'endtime' => $this->faker->dateTimeBetween($startDate = '-2 week', $endDate = '1 week')->format('Y-m-d H:i:s'),
            'user_id' => function(){
                return User::all()->random();
            }
        ];
    }
}
