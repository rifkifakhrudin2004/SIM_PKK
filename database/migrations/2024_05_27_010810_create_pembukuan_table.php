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
        Schema::create('pembukuan', function (Blueprint $table) {
            $table->id('id_pembukuan');
            $table->unsignedBigInteger('id_arisan');
            $table->date('tanggal');
            $table->decimal('pemasukan', 10, 2)->nullable();
            $table->decimal('pengeluaran', 10, 2)->nullable();
            $table->decimal('saldo', 10, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_arisan')->references('id_arisan')->on('m_arisan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembukuan');
    }
};