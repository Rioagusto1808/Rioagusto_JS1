<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = [
        'nama',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'mata_pelajaran',
    ];

    // Relasi: Setiap Guru memiliki satu User
    public function user()
    {
        return $this->hasOne(User::class, 'guru_id'); // 'guru_id' adalah foreign key di tabel users
    }
}
