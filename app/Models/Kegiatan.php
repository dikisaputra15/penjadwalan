<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kegiatan','warna'];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function laporanKegiatans()
    {
        return $this->hasMany(LaporanKegiatan::class);
    }
}
