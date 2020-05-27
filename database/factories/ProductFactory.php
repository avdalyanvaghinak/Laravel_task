<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;


$factory->define(Product::class, function (Faker $faker) {
    return [
//        'user_id' => function(){
//            return factory('App\User')->create()->id;
//        },
//        'category_id' => function(){
//            return factory('App\Models\Category')->create()->id;
//        },
//        'title' => $faker->sentence,
//        'price' => $faker->numberBetween(10,100),
//        'country' => $faker->country,
//        'age' => $faker->numberBetween(10,50),
//        'image' => $faker->image('public/images',150,150, null, false),
//        'description'  => $faker->paragraph
    ];
});
