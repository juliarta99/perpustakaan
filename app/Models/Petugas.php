<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class Petugas extends Model
{
    use HasFactory;

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
}
