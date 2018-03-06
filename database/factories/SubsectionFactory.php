<?php

use Faker\Generator as Faker;

$factory->define(App\Subsection::class, function (Faker $faker) {
    return [
        
    ];
});

$factory->state(App\Subsection::class, 'header', function($faker) {
    return [
        'header' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});

$factory->state(App\Subsection::class, 'footer', function($faker) {
    return [
        'footer' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});