<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Pengembalian;
use App\Models\Peminjaman;

class Buku extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function pengembalians()
    {
        return $this->hasMany(Pengembalian::class);
    }
}
