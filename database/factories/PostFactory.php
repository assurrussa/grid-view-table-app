<?php

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

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'type'         => array_first(array_random(\App\Post::$types, 1)),
        'title'        => $faker->title,
        'preview'      => $faker->imageUrl(),
        'description'  => $faker->word,
        'body'         => $faker->paragraph,
        'published_at' => $faker->dateTimeBetween(),
    ];
});
