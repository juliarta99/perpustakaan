<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Kategori;
use Illuminate\Http\Request;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.rak.index',
        [
            'title' => 'All Rak',
            'raks' => Rak::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.rak.create',
        [
            'title' => 'Create Rak',
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
            'nama' => 'required|unique:raks',
        ]);

        Rak::create($validateData);
        return redirect('/dashboard/rak')->with('succes', 'Rak berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function show(Rak $rak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function edit(Rak $rak)
    {
        return view('dashboard.rak.edit',
        [
            'title' => "Edit $rak->nama",
            'rak' => $rak
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rak $rak)
    {
        $rules = [];
        if($request->nama != $rak->nama) {
            $rules['nama'] = 'required|unique:raks';
        }

        $validateData = $request->validate($rules);

        Rak::where('id', $rak->id)->update($validateData);
        return redirect('/dashboard/rak')->with('succes', 'Rak berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rak $rak)
    {
        $cekRak = Kategori::where('id_rak', $rak->id)->get();
        foreach($cekRak as $r){
            Kategori::destroy('id', $r->id);
        }

        Rak::destroy('id', $rak->id);
        return redirect('/dashboard/rak')->with('succes', 'Rak berhasil dihapus');
    }
}
