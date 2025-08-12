<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Modules\City\Entities\City;
use Modules\Township\Entities\Township;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Township::class, function (Faker $faker) {
    $city = factory(City::class)->create();
    return [
        'name' => $faker->name(),
        'city_id' => $city->id
    ];
});
