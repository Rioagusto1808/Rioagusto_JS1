<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data tingkat kelas ke tabel 'kelas'
        DB::table('kelas')->insert([
            ['tingkat' => '1A'],
            ['tingkat' => '1B'],
            ['tingkat' => '2'],
            ['tingkat' => '3'],
            ['tingkat' => '4'],
            ['tingkat' => '5'],
            ['tingkat' => '6'],
        ]);
    }
}
