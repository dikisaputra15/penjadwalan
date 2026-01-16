<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $fillable = ['nama_wilayah'];

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class);
    }
}
