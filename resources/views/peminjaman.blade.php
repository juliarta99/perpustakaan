@extends('layouts.main')
@section('content')
<?php
use App\Models\Pengembalian;
?>
<div class="w-full flex justify-end">
    <div class="pt-24 px-5 w-full lg:w-3/4 xl:w-4/5 pb-10">
        <h1 class="text-md lg:text-xl font-bold">Peminjaman buku</h1>
        <p class="text-sm lg:text-md mb-4">Buku yang dipinjam</p>
        <table class="w-full">
            <thead>
                <tr class="bg-blue-200 text-md uppercase">
                    <th class="shadow-sm py-1">No</th>
                    <th class="shadow-sm py-1">Tanggal</th>
                    <th class="shadow-sm py-1">Buku</th>
                    <th class="shadow-sm py-1">Petugas</th>
                    <th class="shadow-sm py-1">Status</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($peminjamans as $peminjaman)
                    <tr class="text-sm even:bg-gray-200 text-center">
                        <td class="shadow-sm py-1">{{ $loop->iteration }}</td>
                        <td class="shadow-sm py-1">{{ $peminjaman->tanggal }}</td>
                        <td class="shadow-sm py-1" title="{{ $peminjaman->buku->judul }}">{{ $peminjaman->buku->kode }}</td>
                        <td class="shadow-sm py-1">{{ $peminjaman->petugas->name }}</td>
                        @if (count(Pengembalian::where('id_peminjaman', $peminjaman->id)->get()) == 0)
                            <td class="shadow-sm py-1">Dipinjam</td>
                        @else
                            <td class="shadow-sm py-1">Dikembalikan</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection