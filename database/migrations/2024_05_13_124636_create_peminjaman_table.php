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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->unsignedBigInteger('id_peminjaman')->unique();
            $table->unsignedBigInteger('no_buku');
            $table->foreign('no_buku')->references('no_buku')->on('buku');
            $table->unsignedBigInteger('id_anggota');
            $table->foreign('id_anggota')->references('id_anggota')->on('anggota');
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian');
            $table->enum('pengembalian_buku', ['kembali', 'belum']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
