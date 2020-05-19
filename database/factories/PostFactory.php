<?php
use App\User;
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

$factory->define(\App\Models\Posts::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 7), true);
    $txt = $faker->realText(rand(1000, 4000));
    $isPublished = (bool)random_int(0, 1);

    $post = [
        'user_id'       => (rand(1, 5) == 5) ? 1 : 2,
        'category_id'   => rand(1, 2),
        'title'         => $title,
        'content_raw'   => $txt,
        'content_html'  => $txt,
        'slug'          => Str::slug($title),
        'excerpt'       => $faker->text(rand(40, 100)),
        'is_published'  => $isPublished,
        'published_at'  => ($isPublished > 0) ? $faker->dateTimeBetween('-2 months', '-2 days') : null,
    ];

    return $post;

});
