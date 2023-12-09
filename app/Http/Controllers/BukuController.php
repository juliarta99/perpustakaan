<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.buku.index',
        [
            'title' => 'All Buku',
            'bukus' => Buku::latest()->with('kategori')->filter(request(['search']))->paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.buku.create',
        [
            'title' => 'Tambah Buku',
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kode' => 'required|unique:bukus',
            'judul' => 'required',
            'stok' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'sampul' => 'nullable|file|image|min:1024',
            'id_kategori' => 'required'
        ]);

        if($request->file('sampul')){
            $validateData['sampul'] = $request->file('sampul')->store('buku-images');
        }

        Buku::create($validateData);
        return redirect('/dashboard/buku')->with('succes', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        return view('dashboard.buku.edit',
        [
            'title' => 'Edit Buku',
            'kategoris' => Kategori::all(),
            'buku' => $buku
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $rules = [
            'judul' => 'required',
            'stok' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'sampul' => 'nullable|file|image|max:1024',
            'id_kategori' => 'required'
        ];

        if($request->kode != $buku->kode) {
            $rules['kode'] = 'required|unique:bukus';
        };

        $validateData = $request->validate($rules);

        
        if($request->file('sampul')) {
            if($request->oldSampul) {
                Storage::delete($request->oldSampul);
            }
            $validateData['sampul'] = $request->file('sampul')->store('buku-images');
        }
        
        Buku::where('id', $buku->id)->update($validateData);
        return redirect('/dashboard/buku')->with('succes', 'Buku berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        // hapus buku
        Buku::destroy('id', $buku->id);
        return redirect('/dashboard/buku')->with('succes', 'Buku berhasil dihapus');
    }
}
