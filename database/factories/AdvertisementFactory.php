<?php

use Faker\Generator as Faker;

$factory->define(App\Advertisement::class, function (Faker $faker) {
    return [
        'ad_name' => $faker->word,
        'ad_client' => 'ca-pub-' . $faker->randomNumber($nbDigits = 16, $strict = false),
        'ad-slot' => $faker->randomNumber($nbDigits = 10, $strict = false)
    ];
});

$factory->state(App\Advertisement::class, '336x280', [
    'width'=> 336,
    'height'=> 280,
    'display' => 'inline-block',
]);

$factory->state(App\Advertisement::class, 'auto', [
    'display'=>'block',
    'format'=>'auto'
]);

$factory->state(App\Advertisement::class, 'fluid', [
    'display'=>'block',
    'format'=>'auto',
    'layout'=>'in-article',
    'display' => 'block',
    'text-align'=> 'center',
    'format'=> 'fluid'
]);