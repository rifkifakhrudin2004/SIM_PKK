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
        Schema::table('m_anggota', function (Blueprint $table) {
            $table->string('jumlah_tanggungan')->after('alamat_anggota');
            $table->string('status_kesehatan')->after('jumlah_tanggungan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_anggota', function (Blueprint $table) {
            $table->dropColumn('jumlah_tanggungan');
            $table->dropColumn('status_kesehatan');
        });
    }
};
