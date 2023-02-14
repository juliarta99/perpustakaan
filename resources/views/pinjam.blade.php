@extends('layouts.main')
@section('content')
<div class="w-full flex justify-end">
    <div class="pt-24 px-5 w-full lg:w-3/4 xl:w-4/5 pb-10">
        <div class="w-full mx-auto max-w-md">
            <div class="w-full items-center justify-center flex flex-col">
                @if ($buku->sampul != null)
                    <img src="storage/{{ $buku->sampul }}" alt="{{ $buku->judul }}" class="w-48 h-48 mx-auto">
                @else
                    <img src="{{ asset('img/sampul_default.png') }}" class="w-48 h-48 mx-auto" alt="{{ $buku->judul }}">                    
                @endif
                <h1 class="text-md lg:text-xl font-bold uppercase" title="judul/kode">{{ $buku->judul }} /  {{ $buku->kode }}</h1>
                <p class="text-sm lg:text-md">Kategori: {{ $buku->kategori->name }}</p>
                <p class="text-sm lg:text-md">Penulis: {{ $buku->penulis }}</p>
                <p class="text-sm lg:text-md">Penerbit: {{ $buku->penerbit }}</p>
                <p class="text-sm lg:text-md">Tahun terbit: {{ $buku->tahun }}</p>
                {{-- peringatan --}}
                <p class="text-xs lg:text-sm text-justify text-red-500">*Untuk meminjam buku silahkan pergi ke perpustakaan, kemudian tunjukkan kode anggota dan pinjam buku yang inginkan</p>
            </div>
        </div>
    </div>
</div>
@endsection