<?php

use Faker\Generator as Faker;

$factory->define(App\Paragraph::class, function (Faker $faker) {
    return [
        'body' => $faker->text(500),
    ];
});
