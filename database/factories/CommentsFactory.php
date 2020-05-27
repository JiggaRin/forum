<?php
use App\User;
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

$factory->define(\App\Models\Comments::class, function (Faker $faker) {
    $txt = $faker->realText(rand(500, 2000));

    $comments = [
        'user_id'       =>  (rand(1, 5) == 5) ? 1 : 2,
        'post_id'       =>  rand(1, 50),
        'category_id'   =>  rand(1, 2),
        'body'          =>  $txt,
    ];

    return $comments;

});
