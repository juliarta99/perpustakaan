<?php

namespace App\Http\Controllers;

use App\Models\Sanksi;
use App\Http\Requests\StoreSanksiRequest;
use App\Http\Requests\UpdateSanksiRequest;

class SanksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sanksi.index',
        [
            'title' => 'All Sanksi',
            'sanksis' => Sanksi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sanksi.create',
        [
            'title' => 'Create Sanksi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSanksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSanksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sanksi  $sanksi
     * @return \Illuminate\Http\Response
     */
    public function show(Sanksi $sanksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanksi  $sanksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Sanksi $sanksi)
    {
        return view('dashboard.sanksi.edit',
        [
            'title' => "Edit $sanksi->name",
            'sanksi' => $sanksi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSanksiRequest  $request
     * @param  \App\Models\Sanksi  $sanksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSanksiRequest $request, Sanksi $sanksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanksi  $sanksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sanksi $sanksi)
    {
        Sanksi::destroy('id', $sanksi->id);
        return redirect('/dasboard/sanksi')->with('succes', 'Sanksi berhasil dihapus');
    }
}
