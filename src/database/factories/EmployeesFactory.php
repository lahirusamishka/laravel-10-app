<?php

// Factory pro vytváření instancí modelu Employee.

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;



$factory->define(Employee::class, function (Faker $faker) {
    $rooms = $faker->randomElement(\DB::table('rooms')->select('id')->get());
    $room_id = $rooms->id;
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'job' => $faker->jobTitle,
        'salary' => $faker->numberBetween($min = 15000, $max = 100000),
        'room_id' => $room_id
    ];

});
