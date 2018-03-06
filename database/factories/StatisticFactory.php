<?php

use Faker\Generator as Faker;

$factory->define(App\Statistic::class, function (Faker $faker) {
    return [
        'caption'=>$faker->word,
        'value'=>$faker->randomNumber(),
    ];
});
