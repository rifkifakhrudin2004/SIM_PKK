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
        Schema::table('m_angsuran', function (Blueprint $table) {
            $table->renameColumn('no_angsuran', 'jumlah_angsuran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_angsuran', function (Blueprint $table) {
            //
        });
    }
};
