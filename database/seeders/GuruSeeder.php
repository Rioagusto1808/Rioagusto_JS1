<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
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

        $matematika = MataPelajaran::where('nama_mapel', 'Matematika')->first();
        $bahasaIndonesia = MataPelajaran::where('nama_mapel', 'Bahasa Indonesia')->first();
        // Menambahkan data guru ke tabel 'guru'
        DB::table('guru')->insert([
            ['nama' => 'Yulianti', 'nip' => '1234567890', 'tempat_lahir' => 'Jakarta', 'tanggal_lahir' => '1985-05-20', 'alamat' => 'Jl. Merdeka No. 10, Jakarta', 'mapel_id' => $matematika->id],
            ['nama' => 'Yultari Devensi', 'nip' => '2345678901', 'tempat_lahir' => 'Bandung', 'tanggal_lahir' => '1988-08-15', 'alamat' => 'Jl. Raya No. 5, Bandung', 'mapel_id' => $matematika->id],
            ['nama' => 'Mevin Silviana', 'nip' => '3456789012', 'tempat_lahir' => 'Surabaya', 'tanggal_lahir' => '1990-11-10', 'alamat' => 'Jl. Sudirman No. 20, Surabaya', 'mapel_id' => $matematika->id],
            ['nama' => 'Herlinda', 'nip' => '4567890123', 'tempat_lahir' => 'Yogyakarta', 'tanggal_lahir' => '1987-02-25', 'alamat' => 'Jl. Pahlawan No. 30, Yogyakarta', 'mapel_id' => $bahasaIndonesia->id],
            ['nama' => 'Sunarti', 'nip' => '5678901234', 'tempat_lahir' => 'Medan', 'tanggal_lahir' => '1986-07-12', 'alamat' => 'Jl. Mawar No. 7, Medan', 'mapel_id' => $bahasaIndonesia->id],
            ['nama' => 'Senuni', 'nip' => '6789012345', 'tempat_lahir' => 'Makassar', 'tanggal_lahir' => '1992-04-05', 'alamat' => 'Jl. Raya No. 15, Makassar', 'mapel_id' => $bahasaIndonesia->id],
            ['nama' => 'Eni Sulastri', 'nip' => '6789012346', 'tempat_lahir' => 'Makassar', 'tanggal_lahir' => '1992-04-05', 'alamat' => 'Jl. Raya No. 15, Makassar', 'mapel_id' => $bahasaIndonesia->id],
        ]);
    }
}
