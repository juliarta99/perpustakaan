<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Models\Sanksi;
use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengembalian', 
        [
            'title' => 'Pengembalian',
            'pengembalians' => Pengembalian::latest()->whereHas('peminjaman', function($query){
                $query->where('id_user', Auth::user()->id);
            })->get(),
        ]);
    }

    public function all()
    {
        return view('dashboard.pengembalian.index',
        [
            'title' => 'All Pengembalian',
            'pengembalians' => Pengembalian::latest()->with('peminjaman', 'petugas')->paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pengembalian.create',
        [
            'title' => 'Create Pengembalian',
            'sanksis' => Sanksi::all(),
            'peminjamans' => Peminjaman::doesntHave('pengembalian')->get(),
            'anggotas' => User::where('is_petugas', 0)->get(),
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
            'id_peminjaman' => 'required|unique:pengembalians',
            'id_sanksi' => 'nullable',
        ]);

        $validateData['tanggal'] = Carbon::now()->toDateString();
        $validateData['id_petugas'] = Auth::user()->id;
        
        $cekPeminjaman = Peminjaman::where('id', $request->id_peminjaman)->get();
        if(count($cekPeminjaman) == 0) {
            return redirect('dashboard/pengembalian/all')->with('error', ' Peminjaman tidak ditemukan');
        }

        if($request->id_sanksi) {
            $cekSanksi = Sanksi::where('id', $request->id_sanksi)->get();
            if(count($cekSanksi) == 0) {
                return redirect('dashboard/pengembalian/all')->with('error', 'Sanksi tidak valid');
            }
        }

        $buku = Buku::find($cekPeminjaman[0]->id_buku);
        $buku->update(['stok' => $buku->stok + 1]);
        Pengembalian::create($validateData);
        return redirect('/dashboard/pengembalian/all')->with('succes', 'Buku berhasil dikembalikan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengembalian $pengembalian)
    {
        return view('dashboard.pengembalian.edit',
        [
            'title' => "Edit Pengembalian",
            'pengembalian' => $pengembalian,
            'peminjamans' => Peminjaman::doesntHave('pengembalian')->get(),
            'anggotas' => User::all(),
            'sanksis' => Sanksi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        $rules = [
            'id_sanksi' => 'nullable',
        ];

        if($request->id_peminjaman != $pengembalian->peminjaman->id) {
            $rules['id_peminjaman'] ='required|unique:pengembalians';
        }

        $validateData = $request->validate($rules);

        $validateData['tanggal'] = Carbon::now()->toDateString();
        $validateData['id_petugas'] = Auth::user()->id;


        $cekPeminjaman = Peminjaman::where('id', $request->id_peminjaman)->get();
        if(count($cekPeminjaman) == 0) {
            return redirect('dashboard/pengembalian/all')->with('error', 'Peminjaman tidak ditemukan');
        }

        if($request->id_peminjaman != $pengembalian->peminjaman->id) {
            $bukuSebelunya = Buku::find($pengembalian->peminjaman->id_buku);
            $bukuSebelunya->update(['stok' => $bukuSebelunya->stok - 1]);

            $buku = Buku::find($cekPeminjaman->id_buku);
            $buku->update(['stok' => $buku->stok + 1]);
        } 
        
        if($request->id_sanksi) {
            $cekSanksi = Sanksi::where('id', $request->id_sanksi)->get();
            if(count($cekSanksi) == 0) {
                return redirect('dashboard/pengembalian/all')->with('error', 'Sanksi tidak valid');
            }
        }

        Pengembalian::where('id', $pengembalian->id)->update($validateData);
        return redirect('/dashboard/pengembalian/all')->with('succes', 'Pengembalian berhasil diedit');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengembalian $pengembalian)
    {
        $buku = Buku::find($pengembalian->peminjaman->id_buku);
        $buku->update(['stok' => $buku->stok - 1]);

        Pengembalian::destroy('id', $pengembalian->id);
        return redirect('/dashboard/pengembalian/all')->with('succes', 'Pengembalian berhasil dihapus');
    }
}
