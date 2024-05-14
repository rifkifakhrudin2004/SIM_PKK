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
        Schema::create('m_arisan', function (Blueprint $table) {
            $table->id('id_arisan');
            $table->unsignedBigInteger('id_anggota');
            $table->unsignedBigInteger('id_bendahara');
            $table->date('tgl_arisan');
            $table->string('catatan_arisan', 225);
            $table->decimal('setoran_arisan', 10, 2);
            $table->timestamps();

            $table->foreign('id_anggota')->references('id_anggota')->on('m_anggota');
            $table->foreign('id_bendahara')->references('id_bendahara')->on('m_bendahara_pkk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_arisan');
    }
};
