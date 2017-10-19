<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'firstName' => $faker->firstName,
        'surname' => $faker->lastName,
        'login' => str_random(8),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Shipment::class, function (Faker $faker) {
    return [];
});

$factory->define(App\Order::class, function (Faker $faker) {
    $users = \App\User::orderBy('id')->pluck('id');
$ids=(array) $users;
    $users=array_values($ids);
//    dd($users);
    return [
        'idUser' => $faker->numberBetween(23,92),
        'delivered' => $faker->numberBetween(0,1),
        'idShipment' => $faker->numberBetween(1,10),
        'orderReady' => $faker->numberBetween(0,1),
        'totalProducts' =>$faker->randomFloat(2,15,250)

    ];
});


$factory->define(App\Adress::class, function (Faker $faker) {
//    $phTyp = random.arrayElement(["Belgium","France","Luxembourg"]);
    return [
        'idUser' => $faker->numberBetween(23,92),
        'type' => $faker->numberBetween(1,3),
        'street' => $faker->streetName,
        'number' => $faker->numberBetween(1,92),
        'postCode' => $faker->numberBetween(1000,6000),
        'city' => $faker->city,
//        'country' => $faker->$phTyp,
    ];
});
