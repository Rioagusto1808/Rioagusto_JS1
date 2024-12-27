<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailNilai extends Model
{
    /**
     * Table associated with the model.
     *
     * @var string
     */
    protected $table = 'detail_nilai';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'guru_id',
        'nilai_id',
        'mapel_id',
        'nilai',
        'keterangan',
    ];

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mapel_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
