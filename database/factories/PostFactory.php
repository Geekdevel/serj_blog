<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        },
        'author_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
