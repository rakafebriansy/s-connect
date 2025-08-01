<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    protected $fillable = [
        'nama',
        'longitude',
        'latitude',
        'nomor_telepon',
        'terverifikasi',
    ];
}
