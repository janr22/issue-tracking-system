<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Anonymous',
            'email' => 'anonymous@gmail.com',
            'password' => Hash::make('password'),
            'avatar' => 'https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png',
            'status' => '1',
            'role' => 'anonymous',
        ]);

        // factory(User::class, 50)->create();
    }
}
