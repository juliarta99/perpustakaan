@extends('layouts.main')
@section('content')
<div class="w-full flex justify-end">
    <div class="pt-20 w-3/4 bg-red-50">
        @guest
        <a href="/login" class="text-red-500">login</a>
        @endguest
        @auth
        <p>Halo <span>{{ Auth::user()->name }}</span></p>
        <a href="/logout">Logout</a>
        @endauth
    </div>
</div>
@endsection