<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GambarWisata extends Model
{
    protected $fillable = ['wisata_id', 'gambar'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}
