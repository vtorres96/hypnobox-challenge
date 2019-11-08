<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone_number' => $faker->cellphoneNumber,
        'email' => $faker->unique()->safeEmail,
        'date_of_birth' => $faker->date("Y-m-d"),
        'user_id' => mt_rand(1, 50)
    ];
});
