<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'gambar',
        'dilihat',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
