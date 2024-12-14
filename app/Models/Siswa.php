<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama',
        'nis',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'tahun_masuk',
        'tahun_lulus',
        'status',
        'kelas',
    ];
}
