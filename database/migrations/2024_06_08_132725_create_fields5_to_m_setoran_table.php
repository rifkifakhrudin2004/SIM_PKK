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
        Schema::create('m_setoran', function (Blueprint $table) {
            $table->id('id_setoran');
            $table->unsignedBigInteger('id_simpan');
            $table->date('tgl_setoran');
            $table->decimal('jumlah_setoran',15,2);
            $table->timestamps();

            $table->foreign('id_simpan')
                ->references('id_simpan')
                ->on('m_simpan')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('m_setoran', function (Blueprint $table) {
            $table->dropForeign(['id_simpan']); // Menghapus kunci asing
        });

        Schema::table('m_setoran', function (Blueprint $table) {
            $table->dropColumn('id_simpan'); // Menghapus kolom id_simpan
        });
    }
};
