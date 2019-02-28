<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
       'title' => $faker->text($maxNbChars = 100),
       'content' => $faker->text($maxNbChars = 500),
       'thumbnail' => 'products/upUv8tlUSKaaj6lKE5HF66qxpIXSkklY7YKAxPSn.png',
       'description' => $faker->text($maxNbChars = 200),
       'user_id' => 29,
       'hot' => $faker->randomElement([0, 1]),
       'status' => '1',
       'slug' => str_slug($faker->text($maxNbChars = 100))
    ];
});
