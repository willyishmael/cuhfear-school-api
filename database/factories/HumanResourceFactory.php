<?php

namespace Database\Factories;

use App\Models\human_resource;
use Illuminate\Database\Eloquent\Factories\Factory;

class HumanResourceFactory extends Factory
{
    protected $model = human_resource::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki','Perempuan']),
            'nip' => $this->faker->numberBeetwen(1000000000, 9999999999),
            'tanggal_lahir' => $this->faker->date($max = '1995-12-31'),
            'peran' => $this->faker->randomElement(['Guru','Staf Tata Usaha', ]),
            'foto' => $this->faker->imageUrl($category = 'people')
        ];
    }
}
