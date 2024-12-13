<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penerimaan_siswa_baru', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nisn')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->enum('status', ['diterima', 'ditolak', 'menunggu']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penerimaan_siswa_baru');
    }
};
