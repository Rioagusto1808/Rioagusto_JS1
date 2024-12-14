<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanSiswaBaru extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model
    protected $table = 'penerimaan_siswa_baru';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'status',
    ];
}
