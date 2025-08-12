<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Auth\User;
use Modules\Customer\Entities\Customer;
use Modules\Customer\Enum\CustomerType;

$factory->define(Customer::class, function (Faker $faker) {
	$user = factory(User::class)->create();
    return [
        'user_id' => $user->id,
        'name' => $faker->firstName,
        'mobile' => $faker->phoneNumber,
        'ref_id' => $faker->randomLetter,
        'type' => CustomerType::ID_GENERAL
    ];
});
