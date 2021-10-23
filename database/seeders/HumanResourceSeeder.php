<?php

namespace Database\Seeders;

use App\Models\HumanResource;
use Illuminate\Database\Seeder;

class HumanResourceSeeder extends Seeder
{
    public function run()
    {
        HumanResource::factory()->count(50)->create();
    }
}
