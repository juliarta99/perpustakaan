@extends('dashboard.layouts.main')
@section('content')
<div class="w-full flex justify-end">
    <div class="pt-24 px-5 w-full lg:w-3/4 xl:w-4/5 pb-10">
        <div class="w-full">
            <form action="/dashboard/kategori/{{ $kategori->id }}" method="post" class="flex flex-col">
                @csrf
                @method('put')

                <label for="name" class="text-sm mt-2 md:text-md">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $kategori->name) }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('name') border-2 border-red-500 solid @enderror">
                @error('name')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror

                <label for="kode" class="text-sm mt-2 md:text-md">Kode</label>
                <input type="text" name="kode" id="kode" value="{{ old('kode', $kategori->kode) }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('kode') border-2 border-red-500 solid @enderror">
                @error('kode')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror

                <label for="rak">Rak</label>
                <select name="id_rak" id="rak" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('id_rak') border-2 border-red-500 solid @enderror">
                    @foreach ($raks as $rak)
                    @if (old('id_rak', $kategori->id_rak) == $rak->id)
                        <option value="{{ $rak->id }}" selected>{{ $rak->nama }}</option>
                    @else    
                        <option value="{{ $rak->id }}">{{ $rak->nama }}</option>
                    @endif 
                    @endforeach
                </select>

                <button type="submit" class="bg-gray-500 mt-3 py-2 px-4 rounded-md text-sm md:text-md">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection