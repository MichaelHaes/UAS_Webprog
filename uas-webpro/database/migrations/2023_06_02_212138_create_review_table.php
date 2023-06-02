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
        Schema::create('review', function (Blueprint $table) {
            $table->id('idReview')->autoIncrement();
            $table->unsignedBigInteger('idDokter');
            $table->unsignedBigInteger('idPasien');
            $table->foreign('idDokter')->references('idDokter')->on('janji');
            $table->foreign('idPasien')->references('idPasien')->on('janji');
            $table->integer('rating');
            $table->text('review');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};
