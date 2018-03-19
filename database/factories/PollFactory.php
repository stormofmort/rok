<?php

use Faker\Generator as Faker;

$factory->define(App\Poll::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
        'description'=>$faker->paragraph(2,true),
    ];
});
