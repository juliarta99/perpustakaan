@extends('dashboard.layouts.main')
@section('content')
<div class="w-full flex justify-end">
      <div class="pt-24 px-5 w-full lg:w-3/4 xl:w-4/5 pb-10">
            <form action="/dashboard/user/{{ $user->id }}" class="flex flex-col" method="post">
                    @csrf
                    @method('put') 

                    <label class="text-sm mt-2 md:text-md" for="name">Name</label>
                    <input value="{{ old('name', $user->name) }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('name') border-2 border-red-500 solid @enderror" type="text" name="name" id="name">
                    @error('name')
                        <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                    @enderror

                    <h1 class="text-sm mt-2 md:text-md">Jenis Kelamin</h1>
                    @if ($user->jk == "l")
                    <div class="flex items-center w-10">
                            <label class="text-sm mt-2 md:text-md" for="l">Laki Laki</label>
                            <input class="w-full py-2 px-4 rounded-md bg-gray-100 @error('jk') border-2 border-red-500 solid @enderror" type="radio" name="jk" id="l" value="l" checked>
                            @error('jk')
                                <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                            @enderror
                        </div>
                        @else
                        <div class="flex items-center w-10">
                                <label class="text-sm mt-2 md:text-md" for="l">Laki Laki</label>
                                <input class="w-full py-2 px-4 rounded-md bg-gray-100 @error('jk') border-2 border-red-500 solid @enderror" type="radio" name="jk" id="l" value="l">
                                @error('jk')
                                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                                @enderror
                        </div>
                    @endif

                    @if ($user->jk == "p")
                        <div class="flex items-center w-10">
                            <label class="text-sm mt-2 md:text-md" for="p">Perempuan</label>
                            <input class="w-full py-2 px-4 rounded-md bg-gray-100 @error('jk') border-2 border-red-500 solid @enderror" type="radio" name="jk" id="p" value="p" checked>
                            @error('jk')
                                <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                            @enderror
                        </div>
                    @else    
                        <div class="flex items-center w-10">
                                <label class="text-sm mt-2 md:text-md" for="p">Perempuan</label>
                                <input class="w-full py-2 px-4 rounded-md bg-gray-100 @error('jk') border-2 border-red-500 solid @enderror" type="radio" name="jk" id="p" value="p">
                                @error('jk')
                                    <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                                @enderror
                        </div>
                    @endif


                    <label class="text-sm mt-2 md:text-md" for="is_petugas">Petugas</label>
                    <input value="{{ old('is_petugas', '1') }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('is_petugas') border-2 border-red-500 solid @enderror" type="checkbox" name="is_petugas" id="is_petugas" @checked($user->is_petugas)>
                    @error('is_petugas')
                        <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                    @enderror
                    
                    <label class="text-sm mt-2 md:text-md" for="no_telp">Nomor HP</label>
                    <input value="{{ old('no_telp', $user->no_telp) }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('no_telp') border-2 border-red-500 solid @enderror" type="tel" name="no_telp" id="no_telp">
                    @error('no_telp')
                        <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                    @enderror

                    <label class="text-sm mt-2 md:text-md" for="alamat">Alamat</label>
                    <input value="{{ old('alamat', $user->alamat) }}" class="w-full py-2 px-4 rounded-md bg-gray-100 @error('alamat') border-2 border-red-500 solid @enderror" type="alamat" name="alamat" id="alamat">
                    @error('alamat')
                        <div class="mb-3 text-sm text-red-500 lg:text-md">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="bg-gray-500 mt-3 py-2 px-4 rounded-md text-sm md:text-md">Edit</button>
            </form>
      </div>
</div>
@endsection