<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Modules\DeliveryFee\Entities\DeliveryFee;
use Modules\DeliveryFee\Enum\DeliveryFeeType;
use Modules\City\Entities\City;
use Modules\Township\Entities\Township;

$factory->define(DeliveryFee::class, function (Faker $faker) {
    $fromcity = factory(City::class)->create();
    $tocity = factory(City::class)->create();
    $fromtownship = factory(Township::class)->create();
    $totownship = factory(Township::class)->create();

    return [
        'name' => $faker->name(),
        'type' => DeliveryFeeType::ID_CAR,
        'from_city_id' => $fromcity->id,
        'to_city_id' => $tocity->id,
        'from_township_id' => $fromtownship->id,
        'to_township_id' => $totownship->id,
        'max_height' => $faker->randomNumber(),
        'max_width' => $faker->randomNumber(),
        'max_weight' => $faker->randomNumber(),
        'usd_price' => $faker->randomNumber(),
        'mmk_price' => $faker->randomNumber()

    ];
});
