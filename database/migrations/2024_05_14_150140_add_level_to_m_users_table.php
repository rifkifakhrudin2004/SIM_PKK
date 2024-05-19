<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToMUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_users', function (Blueprint $table) {
            // Menambahkan kolom foreign key
            // $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('level_id')->on('m_level')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_users', function (Blueprint $table) {
            // Menghapus foreign key
            $table->dropForeign(['level_id']);
            // Menghapus kolom foreign key
            $table->dropColumn('level_id');
        });
    }
}
