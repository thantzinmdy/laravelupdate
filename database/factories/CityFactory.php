<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\City\Entities\City;
use Modules\Country\Entities\Country;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    $country = factory(Country::class)->create();
    return [
        'name' => $faker->name(),
        'country_id' => $country->id
    ];
});
