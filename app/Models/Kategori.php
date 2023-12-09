<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rak()
    {
        return $this->belongsTo(Rak::class, 'id_rak');
    }

    public function bukus()
    {
        return $this->hasMany(Buku::class, 'id_kategori');
    }
}
