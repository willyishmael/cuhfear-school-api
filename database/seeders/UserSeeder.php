<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@cuhfear.com',
            'password' => bcrypt('admin'),
            'remember_token' => str::random(20)
        ]);

        User::create([
            'name' => 'osis',
            'email' => 'osis@cuhfear.com',
            'password' => bcrypt('osis'),
            'remember_token' => str::random(20)
        ]);
    }
}
