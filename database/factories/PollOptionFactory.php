<?php

use Faker\Generator as Faker;

$factory->define(App\PollOption::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
