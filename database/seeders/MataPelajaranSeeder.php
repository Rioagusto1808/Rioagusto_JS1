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
            ['nama_mapel' => 'Bahasa Indonesia', 'kode_mapel' => 'BIND001'],
            ['nama_mapel' => 'Fisika', 'kode_mapel' => 'FIS001'],
            ['nama_mapel' => 'Kimia', 'kode_mapel' => 'KIM001'],
            ['nama_mapel' => 'Biologi', 'kode_mapel' => 'BIO001'],
            ['nama_mapel' => 'Bahasa Inggris', 'kode_mapel' => 'BING001'],
            ['nama_mapel' => 'Pendidikan Agama', 'kode_mapel' => 'PA001'],
            ['nama_mapel' => 'Pendidikan Pancasila dan Kewarganegaraan', 'kode_mapel' => 'PPKN001'],
            ['nama_mapel' => 'Sejarah', 'kode_mapel' => 'SEJ001'],
            ['nama_mapel' => 'Ekonomi', 'kode_mapel' => 'EKO001'],
        ]);
    }
}
