<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $now = now();
    return [
        'title' => $faker->title,
        'slug' => $faker->unique()->slug,
        'body' => $faker->text,
        'video_url' => $faker->url,
        'published_at' => $now,
        'created_at' => $now,
        'updated_at' => $now,
    ];
});
