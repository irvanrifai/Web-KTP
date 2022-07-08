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
            'foto' => $this->faker->image(null, 100, 120, 'human', true),
            'NIK' => $this->faker->nik(),
            'nama' => $this->faker->name(mt_rand(2, 4)),
            'tm_lahir' => $this->faker->city(),
            'tgl_lahir' => $this->faker->date(),
            'jk' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'agama' => $this->faker->randomElement(['Islam', 'Katholik', 'Kristen', 'Budha', 'Hindu']),
            'status' => $this->faker->randomElement(['Belum menikah', 'Menikah', 'Cerai']),
            'goldar' => $this->faker->randomElement(['AB', 'B', 'O', 'A']),
            'pekerjaan' => $this->faker->randomElement(['Pelajar/Mahasiswa', 'Pengusaha', 'PNS', 'Wiraswasta', 'Tidak bekerja']),
            'wn' => $this->faker->randomElement(['WNI', 'WNA']),
            'provinsi' => $this->faker->randomElement(['Jawa tengah', 'Jawa timur', 'Jawa barat', 'DIY', 'DKI Jakarta']),
            'kab' => $this->faker->randomElement(['Klaten', 'Surakarta', 'Yogyakarta', 'Semarang']),
            'kec' => $this->faker->randomElement(['Ponggok', 'Polanharjo', 'Delanggu', 'Keprabon']),
            'kel' => $this->faker->randomElement(['Borongan', 'Gatak', 'Jetis', 'Ngabeyan']),
            'rt' => $this->faker->randomDigitNotNull(),
            'rw' => $this->faker->randomDigitNotNull(),
            'add' => $this->faker->streetAddress(),
        ];
    }
}
