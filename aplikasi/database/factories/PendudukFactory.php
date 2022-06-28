<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PendudukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'foto' => $this->faker->image(),
            'NIK' => $this->faker->nik(),
            'nama' => $this->faker->name(mt_rand(2, 4)),
            'tm_lahir' => $this->faker->city(),
            'tgl_lahir' => $this->faker->date(),
            'jk' => $this->faker->title('Laki-laki' | 'Perempuan'),
            // 'agama' => $this->faker->text('Islam' | 'Katholik' | 'Kristen' | 'Budha' | 'Hindu'),
            // 'status' => $this->faker->text('Belum menikah' | 'Menikah' | 'Cerai'),
            // 'goldar' => $this->faker->text('A', ,
            // 'pekerjaan',
            // 'wn',
            // 'provinsi',
            // 'kab',
            // 'kec',
            // 'rt',
            // 'rw',
            // 'add',
        ];
    }
}
