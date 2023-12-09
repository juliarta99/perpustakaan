<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
use App\Models\User;
use App\Models\Sanksi;

class Pengembalian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sanksi()
    {
        return $this->belongsTo(Sanksi::class, 'id_sanksi');
    }
    
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }
    
    public function petugas()
    {
        return $this->belongsTo(User::class, 'id_petugas');
    }
}
