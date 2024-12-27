<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetidakhadiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketidakhadiran', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade'); // Relasi ke tabel siswa
            $table->integer('sakit')->default(0); // Jumlah hari sakit
            $table->integer('izin')->default(0); // Jumlah hari izin
            $table->integer('tanpa_keterangan')->default(0); // Jumlah hari tanpa keterangan
            $table->timestamps(); // Created at & updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ketidakhadiran');
    }
}
