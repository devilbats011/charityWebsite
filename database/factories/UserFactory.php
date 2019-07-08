<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\berita;
use App\usahakami;
use App\slider;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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
/*
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

*/

$factory->define(slider::class, function (Faker $faker) {
    return [

        'gambar' => "storage/download_img/gambar1.jpg",
         'tajuk' => $faker->company,
          'content' =>$faker->realText($maxNbChars = 100, $indexSize = 2),

    ];
});

$factory->define(berita::class, function (Faker $faker) {
    return [

 
         'tajuk' => $faker->company,
         

    ];
});


$factory->define(usahakami::class, function (Faker $faker) {
    return [

        'gambar' => "storage/download_img/gambar1.jpg",
         'tajuk' => $faker->company,
          'content' =>$faker->realText($maxNbChars = 100, $indexSize = 2),

    ];
});

