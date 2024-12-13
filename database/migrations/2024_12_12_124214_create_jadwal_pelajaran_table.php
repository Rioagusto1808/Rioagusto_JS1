<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwal_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('kelas');
            $table->unsignedBigInteger('guru_id');
            $table->foreign('guru_id')->references('id')->on('guru')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_pelajaran');
    }
};
