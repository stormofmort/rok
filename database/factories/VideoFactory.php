<?php

use Faker\Generator as Faker;
use Alaouy\Youtube\Facades\Youtube as Youtube;

$factory->define(App\Video::class, function (Faker $faker) {
    return [
        
    ];
});

$factory->state(App\Video::class, 'file', function($faker) {
    //$image = $faker->image(storage_path() . "/pictures/", 1280, 960, 'nature', false);
    return [
        'file' => $faker->file($sourceDir = "C:/Users/mohamed.latheef/Videos", $targetDir = storage_path() . "/videos/", false),
    ];
});

$factory->state(App\Video::class, 'youtube', function($faker) {
    $id = Youtube::getPopularVideos('us')[$faker->numberBetween(0,9)]->id;
    return [
        'url' => 'www.youtube.com/embed/'.$id,
    ];
});