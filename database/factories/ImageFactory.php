<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    $image = $faker->image(storage_path() . "/pictures/", 1280, 960, 'nature', false);
    Image::make(storage_path() . '/pictures/'. $image)->resize(160, 120)->save(storage_path() . '/pictures/thumbnails/'. str_before($image, '.') . '_small.' . str_after($image, '.'));
    Image::make(storage_path() . '/pictures/'. $image)->resize(320, 240)->save(storage_path() . '/pictures/thumbnails/'. str_before($image, '.') . '_medium.' . str_after($image, '.'));
    Image::make(storage_path() . '/pictures/'. $image)->resize(640, 480)->save(storage_path() . '/pictures/thumbnails/'. str_before($image, '.') . '_large.' . str_after($image, '.'));
    
    return [
        'name'=> str_before($image, '.'),
        'type'=> str_after($image, '.'),
        'slug'=> $faker->unique()->slug,
    ];
});