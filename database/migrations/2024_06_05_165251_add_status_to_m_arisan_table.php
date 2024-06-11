<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('m_arisan', function (Blueprint $table) {
            $table->string('status')->default('Belum Bayar');
        });
    }

    public function down()
    {
        Schema::table('m_arisan', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};