@extends('dashboard.layouts.main')
@section('content')
<div class="w-full flex justify-end">
    <div class="pt-24 px-5 w-full lg:w-3/4 xl:w-4/5 pb-10">
        <a href="/dashboard/buku/create">
            <button class="px-4 py-2 text-sm lg:text-md font-medium bg-blue-500 rounded-md mb-3">Tambah buku</button>
        </a>
        @if (session()->has('succes'))
            <div class="flex w-1/2 p-4 mb-5 bg-green-400 rounded-md lg:w-1/4">{{ session('succes') }}</div>
        @endif
        <div class="w-full">
            <h1 class="text-md lg:text-lg xl:text-xl font-semibold mb-2">Buku Terbaru</h1>
            <div class="flex flex-wrap">
                <table class="w-full">
                    <thead>
                        <tr class="bg-blue-200 text-md uppercase">
                            <th class="shadow-sm py-1">Kode</th>
                            <th class="shadow-sm py-1">Judul</th>
                            <th class="shadow-sm py-1">Kategori</th>
                            <th class="shadow-sm py-1">Tahun terbit</th>
                            <th class="shadow-sm py-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($bukus as $buku)
                            <tr class="text-sm even:bg-gray-200 text-center">
                                <td class="shadow-sm py-1">{{ $buku->kode }}</td>
                                <td class="shadow-sm py-1">{{ $buku->judul }}</td>
                                <td class="shadow-sm py-1">{{ $buku->kategori->name }}</td>
                                <td class="shadow-sm py-1">{{ $buku->tahun }}</td>
                                <td class="shadow-sm py-1">
                                    <div class="flex items-center justify-center">
                                        <a href="/dashboard/buku/{{ $buku->id }}/edit" class="bg-yellow-500 mr-2 p-2 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                              </svg>
                                        </a>
                                        <div>
                                            <form action="/dashboard/buku/{{ $buku->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="bg-red-500 p-2 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $bukus->links() }}
            </div>
        </div>
    </div>
</div>
@endsection