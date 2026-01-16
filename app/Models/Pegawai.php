<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'wilayah_id',
        'nama',
        'nip',
        'jabatan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function laporanKegiatans()
    {
        return $this->hasMany(LaporanKegiatan::class);
    }
}
