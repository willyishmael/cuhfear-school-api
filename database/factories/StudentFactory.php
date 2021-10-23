<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki','Perempuan']),
            'nisn' => rand(1000000000, 9999999999),
            'tanggal_lahir' => $this->faker->date($max = '1995-12-31'),
            'jurusan' => $this->faker->randomElement(['IPA','IPS']),
            'tahun_masuk' => rand(2015, 2021),
            'status' => 'aktif'
        ];
    }
}
