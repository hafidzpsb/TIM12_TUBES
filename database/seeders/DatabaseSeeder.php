<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pasien;
use App\Models\RM;
use App\Models\Konsultasi;
use App\Models\Resep;
use App\Models\Rujukan;
use App\Models\Operasi;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('migrations');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('users');
        $faker = \Faker\Factory::create();
        $j = 10; #Ganti ke angka lain untuk nambahin atau kurangin jumlah record 
        for ($i = 0; $i < $j; $i++) {
            Pasien::create([
                'nama_pasien' => $faker->lastName,
                'jenis_kelamin' => $faker->randomElement(['pria','wanita']),
                'waktu_masuk' => $faker->dateTimeBetween('-1 week','+1 week'),
                'poli' => $faker->randomElement(['gigi','umum','gizi','penyakit dalam','obgyn']),
            ]);
        }
        $id_pasiens = Pasien::pluck('id_pasien');
        for ($i = 0; $i < $j; $i++) {
            RM::create([
                'id_pasien' => $id_pasiens[$i],
                'tinggi_badan' => $faker->numberBetween(160, 180),
                'berat_badan' => $faker->numberBetween(55, 75),
                'tekanan_darah' => $faker->numberBetween(80, 160),
                'detak_jantung' => $faker->numberBetween(50, 110),
                'frekuensi_pernapasan' => $faker->numberBetween(10, 20),
                'suhu' => $faker->numberBetween(30, 45),
                'keluhan' => $faker->randomElement(['pusing','batuk-batuk','badan panas','tenggorokan sakit','muntah-muntah']),
            ]);
        }
        $id_pasien_rms = RM::pluck('id_pasien');
        for ($i = 0; $i < $j; $i++) {
            Konsultasi::create([
                'id_pasien' => $id_pasien_rms[$i],
                'dokter_pj' => $faker->firstName,
                'hasil_diagnosis' => $faker->randomElement(['demam','diare','mag','corona','hipertensi']),
                'tindakan_medis' => $faker->randomElement(['beri obat','rawat']),
            ]);
        }
        $id_konsuls = Konsultasi::pluck('id_konsul');
        for ($i = 0; $i < $j; $i++) {
            Resep::create([
                'id_pasien' => $id_pasiens[$i],
                'id_konsul' => $id_konsuls[$i],
                'resep_obat' => $faker->sentence,
                'jumlah_pembayaran' => $faker->numberBetween(50000, 200000),
            ]);
            Rujukan::create([
                'id_pasien' => $id_pasiens[$i],
                'id_konsul' => $id_konsuls[$i],
                'no_surat_rujukan' => $faker->randomNumber(2, false),
                'tgl_masuk' => $faker->dateTimeBetween('-1 week','+1 week'),
            ]);
            Operasi::create([
                'id_pasien' => $id_pasiens[$i],
                'id_konsul' => $id_pasiens[$i],
                'no_surat_operasi' => $faker->randomNumber(2, false),
                'status_operasi' => $faker->randomElement(['belum dimulai','sedang berjalan','selesai']),
            ]);
        }
    }
}