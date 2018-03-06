<?php

use Faker\Generator as Faker;

$factory->define(App\Section::class, function (Faker $faker) {
    return [
        
    ];
});

$factory->state(App\Section::class, 'header', function($faker) {
    return [
        'header' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});

$factory->state(App\Section::class, 'footer', function($faker) {
    return [
        'footer' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});

$factory->state(App\Section::class, 'single', [
    'type' => 'single',
    'count'=> 1,
]);

$factory->state(App\Section::class, 'double_equal', [
    'type' => 'double_equal',
    'count'=> 2,
]);

$factory->state(App\Section::class, 'double_left', [
    'type' => 'double_left',
    'count'=> 2,
]);

$factory->state(App\Section::class, 'double_right', [
    'type' => 'double_right',
    'count'=> 2,
]);

$factory->state(App\Section::class, 'triple_equal', [
    'type' => 'triple_equal',
    'count'=> 3,
]);

$factory->state(App\Section::class, 'triple_left', [
    'type' => 'triple_left',
    'count'=> 3,
]);

$factory->state(App\Section::class, 'triple_right', [
    'type' => 'triple_right',
    'count'=> 3,
]);

$factory->state(App\Section::class, 'triple_unequal', [
    'type' => 'triple_unequal',
    'count'=> 3,
]);

$factory->state(App\Section::class, 'four', [
    'type' => 'four',
    'count'=> 4,
]);