<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $name=$this->faker->text(50);
    return [

        'name' =>$name,
        'slug'=>\Illuminate\Support\Str::slug($name),
        'description'=>$this->faker->text(200),
    ];
});
