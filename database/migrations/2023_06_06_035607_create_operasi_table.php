<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('operasi', function (Blueprint $table) {
            $table->id('id_operasi');
            $table->unsignedBigInteger('id_pasien');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien');
            $table->unsignedBigInteger('id_konsul');
            $table->foreign('id_konsul')->references('id_konsul')->on('konsultasi');
            $table->integer('no_surat_operasi');
            $table->string('status_operasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operasi');
    }
};
