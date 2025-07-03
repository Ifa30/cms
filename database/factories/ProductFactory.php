<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->words(2, true),
            'kategori' => $this->faker->randomElement(['Seragam', 'Dress', 'Kemeja', 'Jas']),
            'harga' => $this->faker->numberBetween(50000, 300000),
            'gambar' => null,
        ];
    }
}
