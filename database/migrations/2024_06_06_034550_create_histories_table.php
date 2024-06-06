<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pembukuan');
            $table->string('nama_pemenang');
            $table->date('tanggal');
            $table->decimal('nominal', 15, 2);
            $table->string('nama_bendahara')->nullable();
            $table->decimal('total_uang', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('histories');
    }
};
