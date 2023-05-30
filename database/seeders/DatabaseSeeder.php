<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pasien;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            Pasien::create([
                'nama_pasien' => $faker->lastName,
                'jenis_kelamin' => $faker->randomElement(['pria','wanita']),
                'waktu_masuk' => $faker->dateTimeBetween('-1 week','+1 week'),
                'poli' => $faker->randomElement(['anak','gigi','umum']),
            ]);
        }
    }
}
