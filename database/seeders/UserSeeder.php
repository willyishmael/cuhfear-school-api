<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@cuhfear.com',
            'password' => bcrypt('admin'),
            'remember_token' => str::random(20)
        ]);
    }
}
