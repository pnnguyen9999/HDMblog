<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Confession;
use Faker\Generator as Faker;

$factory->define(Confession::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
    ];
});
