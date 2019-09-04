<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Status;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Status::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'content' => $faker->text(),
        'created_at' => $date_time,
        'updated_at' => $date_time,
        'user_id' => User::all()->random()->id,
    ];
});
