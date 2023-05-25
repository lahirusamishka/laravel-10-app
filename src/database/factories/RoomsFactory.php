<?php
// Factory pro vytváření instancí modelu Room.
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'number' => $faker->unique()->numberBetween($min = 0, $max = 10000),
        'telephone' => $faker->unique()->phoneNumber
    ];
});
