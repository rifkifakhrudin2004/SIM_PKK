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
        Schema::create('m_anggota', function (Blueprint $table) {
            $table->id('id_anggota');
            $table->string('nama_anggota');
            $table->string('notelp_anggota');
            $table->string('alamat_anggota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_anggota');
    }
};
