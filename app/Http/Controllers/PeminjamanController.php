<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Buku;
use Carbon\Carbon;
use App\Models\Pengembalian;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('peminjaman', 
        [
            'title' => 'Peminjaman',
            'peminjamans' => Peminjaman::latest()->where('id_user', Auth::user()->id)->get(),
        ]);
    }

    public function all()
    {
        return view('dashboard.peminjaman.index',
        [
            'title' => 'All Peminjaman',
            'peminjamans' => Peminjaman::latest()->with('anggota', 'buku', 'petugas')->paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.peminjaman.create',
        [
            'title' => 'Create Peminjaman',
            'bukus' => Buku::where('stok', '>', 0)->get(),
            'anggotas' => User::where('is_petugas', 0)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_buku' => 'required',
            'id_user' => 'required'
        ]);

        $validateData['tanggal'] = Carbon::now()->toDateString();
        $validateData['id_petugas'] = Auth::user()->id;

        $cekUser = User::where('id', $request->id_user)->get();
        if(count($cekUser) == 0) {
            return redirect('dashboard/peminjaman/all')->with('error', 'Anggota tidak ditemukan');
        };

        $cekUserNotPetugas = User::where('id', $request->id_user)->where('is_petugas', true)->get();
        if(count($cekUserNotPetugas) == 1){
            return redirect('dashboard/peminjaman/all')->with('error', 'Anggota tidak valid');
        };

        $buku = Buku::find($request->id_buku);
        $buku->update(['stok' => $buku->stok - 1]);

        Peminjaman::create($validateData);
        return redirect('dashboard/peminjaman/all')->with('succes', 'Peminjaman berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        return view('dashboard.peminjaman.edit',
        [
            'title' => 'Edit Peminjaman',
            'peminjaman' => $peminjaman,
            'bukus' => Buku::where('stok', '>', 0)->get(),
            'anggotas' => User::where('is_petugas', 0)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $rules = [
            'id_user' => 'required'
        ];
        
        if($request->id_buku != $peminjaman->buku->id) {
            $rules['id_buku'] = 'required';
            $bukuSebelumnya = Buku::find($peminjaman->id_buku);
            $bukuSebelumnya->update(['stok' => $bukuSebelumnya->stok + 1]);
            
            $buku = Buku::find($request->id_buku);
            $buku->update(['stok' => $buku->stok - 1]);
        }
        $validateData = $request->validate($rules);

        $validateData['tanggal'] = Carbon::now()->toDateString();
        $validateData['id_petugas'] = Auth::user()->id;

        $cekUser = User::where('id', $request->id_user)->get();
        if(count($cekUser) == 0) {
            return redirect('dashboard/peminjaman/all')->with('error', 'Anggota tidak ditemukan');
        };

        $cekUserNotPetugas = User::where('id', $request->id_user)->where('is_petugas', true)->get();
        if(count($cekUserNotPetugas) == 1){
            return redirect('dashboard/peminjaman/all')->with('error', 'Anggota tidak valid');
        };

        Peminjaman::where('id', $peminjaman->id)->update($validateData);
        return redirect('/dashboard/peminjaman/all')->with('succes', 'Peminjaman berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $buku = Buku::find($peminjaman->id_buku);
        $buku->update(['stok' => $buku->stok + 1]);

        Peminjaman::destroy('id', $peminjaman->id);
        return redirect('/dashboard/peminjaman/all')->with('succes', 'Peminjaman berhasil dihapus');
    }
}
