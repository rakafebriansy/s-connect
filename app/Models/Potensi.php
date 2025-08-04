<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
    protected $fillable = [
        'u_m_k_m_id',
        'nama',
        'harga',
        'satuan',
    ];

    public function u_m_k_m()
    {
        return $this->belongsTo(UMKM::class);
    }

    public function gambar_potensis()
    {
        return $this->hasMany(GambarPotensi::class);
    }
}
