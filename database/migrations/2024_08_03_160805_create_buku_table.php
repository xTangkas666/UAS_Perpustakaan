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
        Schema::create('buku', function (Blueprint $table) {
            $table->unsignedBigInteger('no_buku')->autoIncrement()->unique();
            $table->string('judul');
            $table->string('edisi');
            $table->unsignedBigInteger('id_rak');
            $table->foreign('id_rak')->references('id_rak')->on('rak');
            $table->date('tahun');
            $table->string('penerbit');
            $table->unsignedBigInteger('id_penulis');
            $table->foreign('id_penulis')->references('id_penulis')->on('penulis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
