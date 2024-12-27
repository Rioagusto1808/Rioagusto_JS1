<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nama_panggilan');
            $table->string('nis')->unique();
            $table->enum('jenis_kelamin', ['laki', 'perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('agama', ['islam', 'kristen', 'katolik', 'hindu', 'buddha', 'konghucu']);
            $table->text('alamat');
            $table->string('ayah');
            $table->string('ibu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->text('alamat_orang_tua');
            $table->year('tahun_masuk');
            $table->year('tahun_lulus')->nullable();
            $table->enum('status', ['lulus', 'belum lulus']);
            $table->timestamps();

            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->unsignedBigInteger('guru_id')->nullable();
            $table->foreign('guru_id')->references('id')->on('guru')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
