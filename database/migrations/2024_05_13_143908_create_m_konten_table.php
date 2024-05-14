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
        Schema::create('m_konten', function (Blueprint $table) {
            $table->id('id_konten');
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_ketua_pkk');
            $table->unsignedBigInteger('id_bendahara');
            $table->date('tgl_konten');
            $table->string('foto_konten',225);
            $table->string('deskripsi_konten',225);
            $table->timestamps();

            $table->foreign('id_admin')->references('id_admin')->on('m_admin');
            $table->foreign('id_ketua_pkk')->references('id_ketua_pkk')->on('m_ketua_pkk');
            $table->foreign('id_bendahara')->references('id_bendahara')->on('m_bendahara_pkk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_konten');
    }
};
