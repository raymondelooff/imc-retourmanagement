<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Retailer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'activated' => true
    ];
});

$factory->defineAs(App\User::class, 'admin', function (Faker\Generator $faker) use ($factory) {
    $user = $factory->raw(App\User::class);

    return array_merge($user, [
        'user_role' => 'admin'
    ]);
});

$factory->defineAs(App\User::class, 'retailer', function (Faker\Generator $faker) use ($factory) {
    $user = $factory->raw(App\User::class);

    return array_merge($user, [
        'user_role' => 'retailer',
        'retailer_id' => function() {
            return factory(App\Retailer::class)->create()->id;
        }
    ]);
});

$factory->define(App\ProductPhase::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(App\ProductCategory::class, function (Faker\Generator $faker) {
    return [
        'category' => $faker->word,
        'productstatus' => $faker->word,
        'productorigin' => $faker->word
    ];
});