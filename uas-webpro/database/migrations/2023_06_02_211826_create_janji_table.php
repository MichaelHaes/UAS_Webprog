<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('janji', function (Blueprint $table) {
            $table->id('idJanji')->autoIncrement();
            $table->unsignedBigInteger('idDokter');
            $table->unsignedBigInteger('idPasien');
            $table->foreign('idDokter')->references('idDokter')->on('dokter');
            $table->foreign('idPasien')->references('idPasien')->on('pasien');
            $table->date('tanggal_temu');
            $table->string('keluhan');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('janji');
    }
};
