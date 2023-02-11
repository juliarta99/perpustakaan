@extends('layouts.main')
@section('content')
<div class="w-full flex justify-end">
    <div class="pt-24 px-5 w-full lg:w-3/4 xl:w-4/5 pb-10">
        <div class="w-full mb-5">
            <div id="logo">
                <img src="" alt="Logo">
            </div>
            <h1 class="text-lg md:text-xl lg:text-2xl xl:text-3xl font-bold text-center">Perpustakaan Aman Sejati</h1>
        </div>
        <div class="w-full">
            <h5 class="text-md md:text-lg lg:text-xl xl:text-2xl font-semibold">Buku Terbaru</h5>
            <div class="flex flex-wrap">
                @foreach ($bukus as $buku)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2">
                    <div class="w-full p-4 rounded-md shadow-md">
                        @if ($buku->sampul != null)
                            <img src="storage/{{ $buku->sampul }}" alt="{{ $buku->judul }}">
                        @else
                            <img src="" alt="{{ $buku->judul }}">
                        @endif
                        <h5 class="tex-md lg:text-lg font-semibold">{{ $buku->judul }}</h5>
                        <p class="text-sm lg:text-md">Kategori: {{ $buku->kategori->name }}</p>
                        <p class="text-sm lg:text-md">Penulis: {{ $buku->penulis }}</p>
                        <div class="w-full flex items-center mt-2 justify-center">
                            <button class="py-1 px-2 bg-blue-500 rounded-md">Pinjam</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection