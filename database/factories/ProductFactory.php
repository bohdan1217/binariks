<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $now = now();
    return [
        'title' => $faker->title,
        'alias' => $faker->unique()->slug(),
        'content' => $faker->text,
        'price' => rand(40,200),
        'created_at' => $now,
        'updated_at' => $now,
    ];
});
