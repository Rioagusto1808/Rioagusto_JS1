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
        'nama_panggilan',
        'nis',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat',
        'ayah',
        'ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'alamat_orang_tua',
        'tahun_masuk',
        'tahun_lulus',
        'status',
        'kelas_id',
        'guru_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function waliKelas()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
