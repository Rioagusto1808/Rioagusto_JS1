<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalAndRelatedTables extends Migration
{
    public function up()
    {
        // Tabel kelas
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('tingkat');
            $table->timestamps();
        });

        // Tabel mata_pelajaran
        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mapel');
            $table->string('kode_mapel')->unique();
            $table->timestamps();
        });

        // Tabel jadwal
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jadwal');
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->date('periode_mulai')->nullable();
            $table->date('periode_selesai')->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('jadwal');
        Schema::dropIfExists('mata_pelajaran');
        Schema::dropIfExists('kelas');
    }
}
