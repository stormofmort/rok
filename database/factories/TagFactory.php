<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name'=>$faker->unique()->regexify('[A-Z]{4,12}'),
        'description'=>$faker->paragraph(6, true),
        'slug'=>$faker->unique()->slug
    ];
});
