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
        'original_price' =>rand(1000,50000) ,
        'selling_price' =>rand(1000,1000) ,
        'qty' =>rand(1,10) ,
        'tax' =>rand(10,100) ,
        'status' =>false ,
        'trending' =>true ,
        'meta_title' =>$this->faker->text(100),
        'meta_keywords' =>$this->faker->text(100),
        'meta_description' =>$this->faker->text(100),



    ];
});
