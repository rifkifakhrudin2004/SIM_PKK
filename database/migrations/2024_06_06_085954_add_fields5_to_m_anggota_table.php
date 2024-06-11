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
        Schema::table('m_pinjam', function (Blueprint $table) {
            $table->integer('lama')->after('status_persetujuan');
            $table->double('bunga')->after('lama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_pinjam', function (Blueprint $table) {
            $table->dropColumn('lama');
            $table->dropColumn('bunga');
        });
    }
};
