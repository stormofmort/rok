<?php

use Faker\Generator as Faker;

$factory->define(App\Poll::class, function (Faker $faker) {
    return [
        'description'=>$faker->paragraph(2,true),
    ];
});
