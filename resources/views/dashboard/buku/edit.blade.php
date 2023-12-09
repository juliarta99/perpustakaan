@extends('dashboard.layouts.main')
@section('content')
<div class="w-full flex justify-end">
    <div class="pt-24 px-5 w-full lg:w-3/4 xl:w-4/5 pb-10">
        <div class="w-full">
            <form action="/dashboard/buku/{{ $buku->id }}" method="post" class="flex flex-col">
                @csrf
                @method('put')
                <label for="id_kategori">Kategori</label>
                <select name="id_kategori" id="id_kategori" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('id_kategori') border-2 border-red-500 solid @enderror">
                    @foreach ($kategoris as $kategori)
                    @if (old('id_kategori', $buku->kategori->id) == $kategori->id)
                        <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>  
                        @else
                        <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                    @endif
                    @endforeach
                </select>
                @error('id_kategori')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror

                <label for="kode" class="text-sm mt-2 md:text-md">Kode</label>
                <input type="text" name="kode" id="kode" value="{{ old('kode', $buku->kode) }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('kode') border-2 border-red-500 solid @enderror">
                @error('kode')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror

                <label for="judul" class="text-sm mt-2 md:text-md">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $buku->judul) }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('judul') border-2 border-red-500 solid @enderror">
                @error('judul')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror

                <label for="stok" class="text-sm mt-2 md:text-md">Stok</label>
                <input type="number" name="stok" id="stok" value="{{ old('stok', $buku->stok) }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('stok') border-2 border-red-500 solid @enderror">
                @error('stok')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror

                <label for="penulis" class="text-sm mt-2 md:text-md">Penulis</label>
                <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $buku->penulis) }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('penulis') border-2 border-red-500 solid @enderror">
                @error('penulis')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror

                <label for="penerbit" class="text-sm mt-2 md:text-md">Penerbit</label>
                <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('penerbit') border-2 border-red-500 solid @enderror">
                @error('penerbit')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror

                <label for="tahun" class="text-sm mt-2 md:text-md">Tahun terbit</label>
                <input type="text" name="tahun" id="tahun" value="{{ old('tahun', $buku->tahun) }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('tahun') border-2 border-red-500 solid @enderror">
                @error('tahun')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror

                <label for="sampul" class="text-sm mt-2 md:text-md">Sampul</label>
                <input type="file" name="sampul" id="sampul" value="{{ old('sampul', $buku->sampul) }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('sampul') border-2 border-red-500 solid @enderror">
                @error('sampul')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror

                <button type="submit" class="bg-gray-500 mt-3 py-2 px-4 rounded-md text-sm md:text-md">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection