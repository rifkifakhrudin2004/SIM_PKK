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
        Schema::create('m_bendahara_pkk', function (Blueprint $table) {
            $table->id('id_bendahara');
            $table->string('nama_bendahara_pkk');
            $table->string('alamat_bendahara_pkk');
            $table->string('notelp_bendahara_pkk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_bendahara_pkk');
    }
};
