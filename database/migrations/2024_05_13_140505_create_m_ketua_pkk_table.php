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
        Schema::create('m_ketua_pkk', function (Blueprint $table) {
            $table->id('id_ketua_pkk');
            $table->string('nama_ketua_pkk');
            $table->string('alamat_ketua_pkk');
            $table->string('notelp_ketua_pkk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_ketua_pkk');
    }
};
