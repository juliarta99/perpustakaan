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

    public function sanksi()
    {
        return $this->belongsTo(Sanksi::class, 'id_sanksi');
    }
    
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
