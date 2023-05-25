<?php
// Factory pro vytváření instancí modelu Key.

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Key;
use Faker\Generator as Faker;

$factory->define(Key::class, function (Faker $faker) {
    $rooms = $faker->unique()->randomElement(\DB::table('rooms')->select('id')->get());
    $room_id = $rooms->id;
    $employees = $faker->randomElement(\DB::table('employees')->select('id')->get());
    $employee_id = $rooms->id;
    return [
        'employee_id' => $employee_id,
        'room_id' => $rooms->id,
    ];
});
