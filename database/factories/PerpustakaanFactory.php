<?php

namespace Database\Factories;

use App\Models\Perpustakaan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class PerpustakaanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Perpustakaan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $judul = $this->faker->sentence;
        $pengarang = $this->faker->name;
        $gambar = $this->faker->image('public/storage/images/perpustakaan', 400, 300, null, false);

        return [
            'judul' => $judul,
            'pengarang' => $pengarang,
            'gambar' => 'images/perpustakaan/' . basename($gambar),
        ];
    }
}
