<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rak;
use App\Models\Pengembalian;
use App\Models\Peminjaman;

class Buku extends Model
{
    use HasFactory;

    public function rak()
    {
        return $this->belongsTo(Rak::class, 'id_rak');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
}
