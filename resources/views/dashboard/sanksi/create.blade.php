@extends('dashboard.layouts.main')
@section('content')
<div class="w-full flex justify-end">
    <div class="pt-24 px-5 w-full lg:w-3/4 xl:w-4/5 pb-10">
        <div class="w-full">
            <form action="/dashboard/sanksi" method="post" class="flex flex-col">
                @csrf

                <label for="name" class="text-sm mt-2 md:text-md">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('name') border-2 border-red-500 solid @enderror">
                @error('name')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror
                <label for="denda" class="text-sm mt-2 md:text-md">Denda</label>
                <input type="number" name="denda" id="denda" value="{{ old('denda') }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('denda') border-2 border-red-500 solid @enderror">
                @error('denda')
                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                @enderror

                <button type="submit" class="bg-gray-500 mt-3 py-2 px-4 rounded-md text-sm md:text-md">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection