<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rujukan', function (Blueprint $table) {
            $table->id('id_rujuk');
            $table->unsignedBigInteger('id_pasien');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien');
            $table->unsignedBigInteger('id_konsul');
            $table->foreign('id_konsul')->references('id_konsul')->on('konsultasi');
            $table->integer('no_surat_rujukan');
            $table->date('tgl_masuk');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('rujukan');
    }
};
