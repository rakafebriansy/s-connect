<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $fillable = ['nama', 'longitude', 'latitude'];

    public function gambar_wisatas()
    {
        return $this->hasMany(GambarWisata::class);
    }
}
