<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post_tag;
use Faker\Generator as Faker;

$factory->define(Post_tag::class, function (Faker $faker) {
    return [
        'post_id' => function () {
            return factory(App\Post::class)->create()->id;
        },
        'tag_id' => function() {
            return factory(App\Tag::class)->create()->id;
        }
    ];
});
