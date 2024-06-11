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
        Schema::table('m_simpan', function (Blueprint $table) {
            $table->dropForeign(['id_bendahara']);

            $table->unsignedBigInteger('id_bendahara')->nullable(false)->change();

            $table->foreign('id_bendahara')->references('id_bendahara')->on('m_bendahara_pkk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_simpan', function (Blueprint $table) {
            $table->dropForeign(['id_bendahara']);

            $table->unsignedBigInteger('id_bendahara')->nullable(false)->change();

            $table->foreign('id_bendahara')->references('id_bendahara')->on('m_bendahara_pkk')->onDelete('cascade');
        });
    }
};
