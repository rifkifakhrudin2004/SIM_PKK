<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddForeignKeyToMAnggotaTable extends Migration
{
    public function up()
    {
<<<<<<< HEAD
        Schema::table('m_anggota', function (Blueprint $table) {
            $table->foreign('nama_anggota')->references('nama')->on('m_users')->onDelete('cascade');
=======
        Schema::table('m_users', function (Blueprint $table) {
            // Check if the foreign key exists before trying to drop it
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $foreignKeys = $sm->listTableForeignKeys('m_users');
            $foreignKeysArray = array_map(function ($key) {
                return $key->getName();
            }, $foreignKeys);

            if (in_array('m_users_id_anggota_foreign', $foreignKeysArray)) {
                $table->dropForeign(['id_anggota']);
            }

            if (in_array('m_users_id_bendahara_foreign', $foreignKeysArray)) {
                $table->dropForeign(['id_bendahara']);
            }

            if (in_array('m_users_id_ketua_pkk_foreign', $foreignKeysArray)) {
                $table->dropForeign(['id_ketua_pkk']);
            }
>>>>>>> 67464be026535122bbe743c78bdb990a77dfe0c8
        });
    }

    public function down()
    {
<<<<<<< HEAD
        Schema::table('m_anggota', function (Blueprint $table) {
            $table->dropForeign(['nama_anggota']);
=======
        Schema::table('m_users', function (Blueprint $table) {
            $table->foreign('id_anggota')->references('id')->on('m_anggota');
            $table->foreign('id_bendahara')->references('id')->on('m_bendahara_pkk');
            $table->foreign('id_ketua_pkk')->references('id')->on('m_ketua_pkk');
>>>>>>> 67464be026535122bbe743c78bdb990a77dfe0c8
        });
    }
}
