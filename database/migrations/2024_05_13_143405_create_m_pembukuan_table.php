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
        Schema::create('m_pembukuan', function (Blueprint $table) {
            $table->id('id_pembukuan');
            $table->unsignedBigInteger('id_bendahara'); // Menggunakan unsignedBigInteger untuk id_bendahara
            $table->date('tgl_pembukuan');
            $table->double('kredit');
            $table->double('debit');
            $table->timestamps();

            $table->foreign('id_bendahara')->references('id_bendahara')->on('m_bendahara_pkk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_pembukuan');
    }
};
