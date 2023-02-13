@extends('dashboard.layouts.main')
@section('content')
<div class="w-full flex justify-end">
    <div class="pt-24 px-5 w-full lg:w-3/4 xl:w-4/5 pb-10">
        <div class="w-full mb-5">
            <div id="logo">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-32 h-32 mx-auto">
            </div>
            <h1 class="text-lg md:text-xl lg:text-2xl font-bold text-center">Perpustakaan Aman Sejati</h1>
        </div>
        <div class="w-full my-4">
            <div class="w-full lg:w-1/2 xl:w-1/3 bg-gray-400 rounded-md shadow-md">
                <div class="flex items-center">
                    <img src="{{ asset('img/sampul_default.png') }}" alt="Foto Buku" class="w-20 h-20">
                    <div class="ml-2">
                        <h1 class="text-md lg:text-lg font-semibold">Total Buku</h1>
                        <h5 class="text-sm lg:text-md">{{ count($allBuku) }} buku</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full">
            <h5 class="text-md md:text-lg lg:text-xl font-semibold">Buku Terbaru</h5>
            <div class="flex flex-wrap">
                @foreach ($bukus as $buku)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2">
                    <div class="w-full p-4 rounded-md shadow-md">
                        @if ($buku->sampul != null)
                            <img src="storage/{{ $buku->sampul }}" class="w-16 h-16 mx-auto" alt="{{ $buku->judul }}">
                        @else
                            <img src="{{ asset('img/sampul_default.png') }}" class="w-16 h-16 mx-auto" alt="{{ $buku->judul }}">
                        @endif
                        <h5 class="text-center text-md lg:text-lg font-semibold">{{ $buku->judul }}</h5>
                        <p class="text-center text-sm lg:text-md">Kategori: {{ $buku->kategori->name }}</p>
                        <p class="text-center text-sm lg:text-md">Penulis: {{ $buku->penulis }}</p>
                        <div class="w-full flex items-center mt-2 justify-center">
                            <a href="">
                                <button class="py-1 px-2 bg-gray-500 rounded-md">Pinjam</button>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $bukus->links() }}
        </div>
    </div>
</div>
@endsection