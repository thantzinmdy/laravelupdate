<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Auth\User;
use Modules\DeliverySupplier\Entities\DeliverySupplier;
use Modules\Township\Entities\Township;
use Modules\DeliverySupplier\Enum\DeliverySupplierType;

$factory->define(DeliverySupplier::class, function (Faker $faker) {
	$user = factory(User::class)->create();
	$township = factory(Township::class)->create();
    return [
        'user_id' => $user->id,
        'name' => $faker->firstName,
        'mobile' => $faker->phoneNumber,
        'ref_id' => $faker->randomLetter,
        'type' => DeliverySupplierType::ID_CAR,
        'country_id' => $township->city->country_id,
        'city_id' => $township->city_id,
        'township_id' => $township->id
    ];
});
