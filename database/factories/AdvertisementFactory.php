<?php

use Faker\Generator as Faker;

$factory->define(App\Advertisement::class, function (Faker $faker) {
    return [
        
    ];
});

$factory->state(App\Advertisement::class, 'medium_rectangle', [
    'name'=>'medium rectangle',
    'size'=>'300x250'
]);

$factory->state(App\Advertisement::class, 'large_rectangle', [
    'name'=>'large rectangle',
    'size'=>'336x280'
]);