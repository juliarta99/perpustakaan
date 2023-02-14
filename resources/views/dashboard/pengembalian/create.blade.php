@extends('dashboard.layouts.main')
@section('content')
<div class="w-full flex justify-end">
    <div class="pt-24 px-5 w-full lg:w-3/4 xl:w-4/5 pb-10">
        <div class="w-full">
            <form action="/dashboard/pengembalian" autocomplete="off" method="post" class="flex flex-col">
                @csrf

                <label for="id_peminjaman" class="text-sm mt-2 md:text-md">Peminjaman</label>
                <input type="text" list="listPeminjaman" name="id_peminjaman" id="id_peminjaman" value="{{ old('id_peminjaman') }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('id_peminjaman') border-2 border-red-500 solid @enderror">
                <datalist id="listPeminjaman">
                    @foreach ($peminjamans as $peminjaman)
                        <option value="{{ $peminjaman->id }}">{{ $peminjaman->buku->kode }}/{{ $peminjaman->buku->judul }}</option>
                    @endforeach
                </datalist>
                @error('id_peminjaman')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror
                
                <label for="id_user" class="text-sm mt-2 md:text-md">Anggota</label>
                <input type="text" list="listAnggota" name="id_user" id="id_user" value="{{ old('id_user') }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('id_user') border-2 border-red-500 solid @enderror">
                <datalist id="listAnggota">
                    @foreach ($anggotas as $anggota)
                        <option value="{{ $anggota->id }}">{{ $anggota->kode }}/{{ $anggota->name }}</option>
                    @endforeach
                </datalist>
                @error('id_user')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror

                <label for="id_sanksi" class="text-sm mt-2 md:text-md">Sanksi</label>
                <input type="text" list="listSanksi" name="id_sanksi" id="id_sanksi" value="{{ old('id_sanksi') }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('id_sanksi') border-2 border-red-500 solid @enderror">
                <datalist id="listSanksi">
                    @foreach ($sanksis as $sanksi)
                        <option value="{{ $sanksi->id }}">{{ $sanksi->denda }}/{{ $sanksi->name }}</option>
                    @endforeach
                </datalist>
                @error('id_sanksi')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror

                <button type="submit" class="bg-gray-500 mt-3 py-2 px-4 rounded-md text-sm md:text-md">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection