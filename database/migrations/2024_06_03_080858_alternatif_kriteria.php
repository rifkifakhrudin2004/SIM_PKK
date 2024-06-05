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
        Schema::create('alternatif_kriteria', function (Blueprint $table) {
            $table->foreignId('alternatif_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('kriteria_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->float('nilai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatif_kriteria');
    }
};
