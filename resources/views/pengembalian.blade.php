@extends('layouts.main')
@section('content')
<div class="w-full flex justify-end">
    <div class="pt-24 px-5 w-full lg:w-3/4 xl:w-4/5 pb-10">
        <h1 class="text-md lg:text-xl font-bold">Pengembalian buku</h1>
        <p class="text-sm lg:text-md mb-4">Buku yang sudah dikembalikan</p>
        <table class="w-full">
            <thead>
                <tr class="bg-blue-200 text-md uppercase">
                    <th class="shadow-sm py-1">No</th>
                    <th class="shadow-sm py-1">Tanggal</th>
                    <th class="shadow-sm py-1">Buku</th>
                    <th class="shadow-sm py-1">Petugas</th>
                    <th class="shadow-sm py-1">Sanksi</th>
                </tr>
            </thead>
            <tbody class="">
                @if (count($peminjamans->pengembalian) == 0 )
                
                @else
                    
                @foreach ($peminjamans as $peminjaman)
                    <tr class="text-sm even:bg-gray-200 text-center">
                        <td class="shadow-sm py-1">{{ $loop->iteration }}</td>
                        <td class="shadow-sm py-1">{{ $peminjaman->pengembalian->tanggal }}</td>
                        <td class="shadow-sm py-1" title="{{ $peminjaman->buku->judul }}">{{ $peminjaman->buku->kode }}</td>
                        <td class="shadow-sm py-1">{{ $peminjaman->pengembalian->petugas->name }}</td>
                        <td class="shadow-sm py-1" title="{{ $peminjaman->pengembalian->sanksi->denda }}">{{ $peminjaman->pengembalian->sanksi->name }}</td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection