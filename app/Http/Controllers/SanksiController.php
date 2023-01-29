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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
    }
}
