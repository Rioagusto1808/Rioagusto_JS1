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
            ['tingkat' => '2A'],
            ['tingkat' => '2B'],
            ['tingkat' => '3A'],
            ['tingkat' => '3B'],
            ['tingkat' => '4A'],
            ['tingkat' => '4B'],
            ['tingkat' => '5A'],
            ['tingkat' => '5B'],
            ['tingkat' => '6A'],
            ['tingkat' => '6B'],
        ]);
    }
}
