<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) { 
    return [
        'title' => $faker->sentence(6, true),
        'body' => $faker->text(500),
        'slug' => $faker->unique()->slug,
    ];
});

$factory->state(App\Article::class, 'published', [
    'status'=>true,
]);