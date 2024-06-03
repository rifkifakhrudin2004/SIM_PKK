<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToMAnggotaTable extends Migration
{
    public function up()
    {
        Schema::table('m_anggota', function (Blueprint $table) {
            $table->foreign('nama_anggota')->references('nama')->on('m_users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('m_anggota', function (Blueprint $table) {
            $table->dropForeign(['nama_anggota']);
        });
    }
}
