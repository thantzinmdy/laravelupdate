<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Customer\Entities\Customer;
use Modules\Customer\Entities\CustomerLocation;
use Modules\Country\Entities\Country;

$factory->define(CustomerLocation::class, function (Faker $faker) {
    $customer = factory(Customer::class)->create();
    $country = factory(Country::class)->create();
    return [
        'customer_id' => $customer->id,
        'country_id' => $country->id,
        'city_id' => 1,
        'township_id' => 1
        
    ];
});
