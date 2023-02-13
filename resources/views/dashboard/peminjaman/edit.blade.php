@extends('dashboard.layouts.main')
@section('content')
<div class="w-full flex justify-end">
    <div class="pt-24 px-5 w-full lg:w-3/4 xl:w-4/5 pb-10">
        <div class="w-full">
            <form action="/dashboard/peminjaman/{{ $peminjaman->id }}" autocomplete="off" method="post" class="flex flex-col">
                @csrf
                @method('put')

                <label for="id_buku" class="text-sm mt-2 md:text-md">Buku</label>
                <input type="text" list="listBuku" name="id_buku" id="id_buku" value="{{ old('id_buku', $peminjaman->buku->id) }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('id_buku') border-2 border-red-500 solid @enderror">
                <datalist id="listBuku">
                    @foreach ($bukus as $buku)
                        <option value="{{ $buku->id }}">{{ $buku->kode }}</option>
                    @endforeach
                </datalist>
                @error('id_buku')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror
                
                <label for="id_user" class="text-sm mt-2 md:text-md">Anggota</label>
                <input type="text" list="listAnggota" name="id_user" id="id_user" value="{{ old('id_user', $peminjaman->anggota->id) }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('id_user') border-2 border-red-500 solid @enderror">
                <datalist id="listAnggota">
                    @foreach ($anggotas as $anggota)
                        <option value="{{ $anggota->id }}">{{ $anggota->kode }}</option>
                    @endforeach
                </datalist>
                @error('id_user')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror

                <button type="submit" class="bg-gray-500 mt-3 py-2 px-4 rounded-md text-sm md:text-md">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection