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
        Schema::create('m_pinjam', function (Blueprint $table) {
            $table->id('id_pinjam');
            $table->unsignedBigInteger('id_anggota');
            $table->unsignedBigInteger('id_bendahara');
            $table->date('tgl_pengajuan');
            $table->decimal('jumlah_pinjaman',10,2);
            // Mengubah enum menjadi array
            $table->enum('status_persetujuan', ['belum', 'selesai']);
            $table->timestamps();

            $table->foreign('id_anggota')->references('id_anggota')->on('m_anggota')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_bendahara')->references('id_bendahara')->on('m_bendahara_pkk')->onDelete('cascade')->onUpdate('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_pinjam');
    }
};
