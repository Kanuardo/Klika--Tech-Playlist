<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Playlist;
use Faker\Generator as Faker;

$factory->define(Playlist::class, function (Faker $faker) {
    return [
        //
        'artist'=>['Drake', 'Imagine Dragons', 'Halsey', 'Kanye West', 'Doja Cat', 'A$AP Rocky', 'Kendrick Lamar','LIZER', 'Dua Lipa', 'Travis Scott'][rand(0,9)],
        'track'=>$faker->sentence($nbWords = 4, $variableNbWords = true),
        'genre'=>['Rock', 'Jazz','Folk', 'Blues', 'Dubstep', 'Techno', 'Electro'][rand(0,6)],
        'year'=>rand(2000, 2020),
        'duration'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 15)
    ];
});
