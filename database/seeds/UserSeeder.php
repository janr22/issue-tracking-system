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
            'avatar' => 'https://lh3.googleusercontent.com/ogw/ADGmqu_UggxPzsIdUygsoV0QrCr0-l2juCHaSDR7sTAe4Q=s83-c-mo',
            'status' => '1',
            'role' => 'anonymous',
        ]);

        factory(User::class, 50)->create();
    }
}
