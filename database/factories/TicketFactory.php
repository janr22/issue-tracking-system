<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'project' => $faker->randomElement(['Loop (core)', 'Loop IM', 'Loop - Email (Inbox)', 'NMS Production Reports']),
        'subject',
        'email',
        'description',
        'status' => $faker->randomElement(['New', 'Closed', 'Assigned', 'In-Progress', 'Resolved']),
        'tracker' => $faker->randomElement(['Feature', 'Bug']),
        'priority' => $faker->randomElement(['Normal', 'Low', 'High']),
        'confidentiality' => $faker->randomElement(['Private', 'Public']),
        'lock' => $faker->randomElement(['Lock', 'Unlock']),
        'owner_id'
    ];
});
