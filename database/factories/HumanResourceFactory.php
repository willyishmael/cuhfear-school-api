<?php

namespace Database\Factories;

use App\Models\HumanResource;
use Illuminate\Database\Eloquent\Factories\Factory;

class HumanResourceFactory extends Factory
{
    protected $model = HumanResource::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki','Perempuan']),
            'nip' => rand(1000000000, 9999999999),
            'tanggal_lahir' => $this->faker->date($max = '1995-12-31'),
            'peran' => $this->faker->randomElement(['Guru','Staf Tata Usaha', ]),
            'foto' => $this->faker->imageUrl($category = 'people')
        ];
    }
}
