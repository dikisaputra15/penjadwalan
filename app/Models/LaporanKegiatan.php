<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'kegiatan_id',
        'tanggal',
        'deskripsi',
        'foto',
        'latitude',
        'longitude',
        'status'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
