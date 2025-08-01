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

    public function umkm()
    {
        return $this->belongsTo(UMKM::class,'u_m_k_m_id','id');
    }
}
