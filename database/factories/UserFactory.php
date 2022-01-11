<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = User::class;

    public function definition()
    {
        $file = UploadedFile::fake()->image('profile.jpg', 500, 500);     
        $ext = $file->guessExtension();
        $fileName = Str::random(32).'.'.$ext;
        $target_path = public_path('/users/');
        //ファイルをpublic/uploadフォルダに移動
        $file->move($target_path,$fileName);
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => 'testtest',
            'remember_token' => Str::random(10),
            'birth_year' => $this->faker->year,
            'birth_month' =>$this->faker->month,
            'user_desc' => $this->faker->realText(50),
            'prof_img' =>$fileName,
        ];
    }
}

