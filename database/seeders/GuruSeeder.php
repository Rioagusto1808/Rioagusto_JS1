<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data guru ke tabel 'guru'
        DB::table('guru')->insert([
            ['nama' => 'Budi Santoso', 'nip' => '1234567890', 'tempat_lahir' => 'Jakarta', 'tanggal_lahir' => '1985-05-20', 'alamat' => 'Jl. Merdeka No. 10, Jakarta', 'mata_pelajaran' => 'Matematika'],
            ['nama' => 'Siti Aisyah', 'nip' => '2345678901', 'tempat_lahir' => 'Bandung', 'tanggal_lahir' => '1988-08-15', 'alamat' => 'Jl. Raya No. 5, Bandung', 'mata_pelajaran' => 'Fisika'],
            ['nama' => 'Andi Pratama', 'nip' => '3456789012', 'tempat_lahir' => 'Surabaya', 'tanggal_lahir' => '1990-11-10', 'alamat' => 'Jl. Sudirman No. 20, Surabaya', 'mata_pelajaran' => 'Bahasa Indonesia'],
            ['nama' => 'Dewi Rahayu', 'nip' => '4567890123', 'tempat_lahir' => 'Yogyakarta', 'tanggal_lahir' => '1987-02-25', 'alamat' => 'Jl. Pahlawan No. 30, Yogyakarta', 'mata_pelajaran' => 'Biologi'],
            ['nama' => 'Tono Wijaya', 'nip' => '5678901234', 'tempat_lahir' => 'Medan', 'tanggal_lahir' => '1986-07-12', 'alamat' => 'Jl. Mawar No. 7, Medan', 'mata_pelajaran' => 'Kimia'],
            ['nama' => 'Eka Putri', 'nip' => '6789012345', 'tempat_lahir' => 'Makassar', 'tanggal_lahir' => '1992-04-05', 'alamat' => 'Jl. Raya No. 15, Makassar', 'mata_pelajaran' => 'Pendidikan Agama'],
        ]);
    }
}
