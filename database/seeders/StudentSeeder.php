<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        Student::factory()->count(150)->create();

        Student::where('tahun_masuk' , '<' , '2018')->update(['status' => 'lulus']);
    }
}
