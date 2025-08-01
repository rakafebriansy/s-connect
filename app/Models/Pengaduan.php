<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = [
        'judul',
        'isi',
        'dusun',
        'jenis_pengaduan',
    ];
}
