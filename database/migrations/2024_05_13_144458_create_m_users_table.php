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
        Schema::create('m_users', function (Blueprint $table) {
            $table->id('id_users');
            $table->string('username',225);
            $table->string('password',225);
            $table->enum('level_users', ['anggota', 'admin', 'ketua_pkk', 'bendahara_pkk']);
            $table->enum('foto_konten', ['aktif', 'tidak aktif']);
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_ketua_pkk');
            $table->unsignedBigInteger('id_bendahara');
            $table->unsignedBigInteger('id_anggota');
            $table->unsignedBigInteger('level_id');

            $table->foreign('id_admin')->references('id_admin')->on('m_admin');
            $table->foreign('id_anggota')->references('id_anggota')->on('m_anggota');
            $table->foreign('id_ketua_pkk')->references('id_ketua_pkk')->on('m_ketua_pkk');
            $table->foreign('id_bendahara')->references('id_bendahara')->on('m_bendahara_pkk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_users');
    }
};
