<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data mata pelajaran ke tabel 'mata_pelajaran'
        DB::table('mata_pelajaran')->insert([
            ['nama_mapel' => 'Matematika', 'kode_mapel' => 'MAT001'],
            ['nama_mapel' => 'Ilmu Pengetahuan Alam', 'kode_mapel' => 'IPA001'],
            ['nama_mapel' => 'Bahasa Indonesia', 'kode_mapel' => 'BIND001'],
            ['nama_mapel' => 'Pendidikan Jasmani', 'kode_mapel' => 'PJOK001'],
            ['nama_mapel' => 'Pendidikan Agama Islam', 'kode_mapel' => 'PAI001'],
            ['nama_mapel' => 'Proyek Penguatan Profil Pelajar Pancasila
', 'kode_mapel' => 'P5001'],
            ['nama_mapel' => 'Seni Budaya dan Prakarya', 'kode_mapel' => 'SBDP001'],
            ['nama_mapel' => 'Penilaian Angka Kredit Guru', 'kode_mapel' => 'PAK001'],
        ]);
    }
}
