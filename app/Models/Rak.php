<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Rak extends Model
{
    use HasFactory;

    protected $quarded = ['id'];

    public function kategoris()
    {
     return $this->hasMany(Kategori::class);   
    }
}
