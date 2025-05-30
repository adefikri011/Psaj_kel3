<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'nis' => $this->faker->unique()->numerify('########'),
            'kelas' => $this->faker->randomElement(['10 RPL 1', '11 RPL 2', '12 AKL 3']),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => $this->faker->address,
            'image' => 'https://picsum.photos/seed/' . $this->faker->unique()->word . '/150/150',
        ];
    }
}
