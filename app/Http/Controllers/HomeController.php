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
            'bukus' => Buku::latest()->with('kategori')->filter(request(['search']))->paginate(4),
            'allBuku' => Buku::all(),
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
