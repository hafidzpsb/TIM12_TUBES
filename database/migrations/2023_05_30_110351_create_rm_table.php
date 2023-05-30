<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rm', function (Blueprint $table) {
            $table->id('id_rm');
            $table->unsignedBigInteger('id_pasien');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->integer('tekanan_darah');
            $table->integer('detak_jantung');
            $table->integer('frekuensi_pernapasan');
            $table->integer('suhu');
            $table->string('keluhan');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('rm');
    }
};
