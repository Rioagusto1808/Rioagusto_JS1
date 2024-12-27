<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketidakhadiran extends Model
{
    use HasFactory;

    // Nama tabel yang terkait
    protected $table = 'ketidakhadiran';

    // Kolom yang dapat diisi (mass assignment)
    protected $fillable = [
        'siswa_id',
        'sakit',
        'izin',
        'tanpa_keterangan',
    ];

    /**
     * Relasi ke model Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
