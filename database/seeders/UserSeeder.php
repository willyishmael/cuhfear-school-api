<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@cuhfear.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
