<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveForeignKeysFromMUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Menghapus foreign key id_anggota di tabel m_users
        Schema::table('m_users', function (Blueprint $table) {
            $table->dropForeign(['id_anggota']);
        });

        // Menghapus foreign key id_bendahara di tabel m_users
        Schema::table('m_users', function (Blueprint $table) {
            $table->dropForeign(['id_bendahara']);
        });

        // Menghapus foreign key id_ketua_pkk di tabel m_users
        Schema::table('m_users', function (Blueprint $table) {
            $table->dropForeign(['id_ketua_pkk']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Menambahkan kembali foreign key id_anggota di tabel m_users
        Schema::table('m_users', function (Blueprint $table) {
            $table->foreign('id_anggota')->references('id')->on('m_anggota');
        });

        // Menambahkan kembali foreign key id_bendahara di tabel m_users
        Schema::table('m_users', function (Blueprint $table) {
            $table->foreign('id_bendahara')->references('id')->on('m_bendahara_pkk');
        });

        // Menambahkan kembali foreign key id_ketua_pkk di tabel m_users
        Schema::table('m_users', function (Blueprint $table) {
            $table->foreign('id_ketua_pkk')->references('id')->on('m_ketua_pkk');
        });
    }
}
