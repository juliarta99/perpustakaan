<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index',
        [
            'title' => 'Dashboard Perpustakaan',
            'bukus' => Buku::latest()->with('kategori')->filter(request(['search']))->paginate(4),
            'allBuku' => Buku::all()
        ]);
    }
}
