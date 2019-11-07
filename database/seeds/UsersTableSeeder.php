<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "email_verified_at" => now(),
            "remember_token" => Str::random(10),
            "password" => bcrypt("12345678")
        ]);

        User::create([
            "name" => "user",
            "email" => "user@gmail.com",
            "email_verified_at" => now(),
            "remember_token" => Str::random(10),
            "password" => bcrypt("12345678")
        ]);

        factory(User::class, 48)->create();
    }
}
