<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Foo;
use Faker\Generator as Faker;

$factory->define(Foo::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'size' => $faker->numberBetween(0, 100)
    ];
});
