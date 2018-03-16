<?php

use Faker\Generator as Faker;

$factory->define(\App\Channel::class, function (Faker $faker) {
    return [
        'name'        => str_slug($faker->name, ''),
        'description' => $faker->paragraph(),
        'avatar'      => 'https://cdn.jsdelivr.net/npm/cdn-votepen@1.0.2/imgs/channel-avatar.png',
    ];
});
