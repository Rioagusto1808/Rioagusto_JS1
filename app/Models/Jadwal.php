<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'nama_jadwal',
        'kelas_id',
        'periode_mulai',
        'periode_selesai',
    ];

    public function details()
    {
        return $this->hasMany(DetailJadwal::class, 'jadwal_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
