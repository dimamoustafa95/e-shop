<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(Product::class, function (Faker $faker) {
    $name=$this->faker->text(50);
    return [
        'cate_id' =>rand(1,5) ,
        'name' =>$name,
        'slug'=>Str::slug($name),
        'small_description'=>$this->faker->text(50),
        'description'=>$this->faker->text(200),

    ];
});
