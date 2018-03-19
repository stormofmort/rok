<?php

use Faker\Generator as Faker;

$factory->define(App\Audio::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->state(App\Audio::class, 'file', function($faker) {
    return [
        'file' => $faker->file($sourceDir = "C:/Users/" . env('USERDIR', 'mohamed.latheef') . "/Music", $targetDir = storage_path() . "/audios/", false),
    ];
});


$factory->state(App\Audio::class, 'spotify', function($faker) {
    
});