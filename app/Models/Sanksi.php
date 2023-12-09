<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pengembalians()
    {
        return $this->hasMany(Pengembalian::class, 'id_sanksi');
    }
}
