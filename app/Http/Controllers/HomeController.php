<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', 
        [
            'title' => 'Perpustakaan',
            'bukus' => Buku::latest()->where('stok', '>', 0)->with('kategori')->filter(request(['search']))->paginate(8),
            'allBuku' => Buku::where('stok', '>', 0)->get(),
        ]);
    }

    public function pinjam(Buku $buku)
    {
        return view('pinjam', 
        [
            'title' => "Pinjam Buku $buku->judul",
            'buku' => $buku
        ]);
    }
}
