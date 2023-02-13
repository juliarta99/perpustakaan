<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>{{ $title }}</title>
      @vite('resources/css/app.css')
</head>
<body>
      <div class="w-full px-10">
            <div class="w-full h-screen flex items-center justify-center">
                  <div class="hidden lg:block lg:w-1/2">
                        <img src="{{ asset('img/left_login.png') }}" alt="Left Login">
                  </div>
                  <div class="lg:w-1/2 w-full px-5">
                        <h1 class="text-md md:text-lg lg:text-xl xl:text-2xl uppercase font-semibold text-center">Login</h1>
                        <form action="/login" method="post" class="flex flex-col">
                              @csrf
                              @if($errors->any())
                                    <div class="w-full text-sm text-center text-red-500 md:text-md">{{ $errors->first() }}</div>
                              @endif
                              <label for="idPengguna" class="text-sm lg:text-md mt-2">Id Pengguna</label>
                              <input type="text" name="kode" id="kode" class="bg-gray-200 rounded-md py-2 px-4 @error('kode')
                              border-2 solid border-red-500
                              @enderror">
                              @error('kode')
                                    <div class="text-sm lg:text-md text-red-500">{{ $message }}</div>
                              @enderror
                              
                              <label for="password" class="text-sm lg:text-md mt-2">Password</label>
                              <input type="password" name="password" id="password" class="bg-gray-200 rounded-md py-2 px-4 @error('password')
                              border-2 solid border-red-500
                              @enderror">
                              @error('password')
                                    <div class="text-sm lg:text-md text-red-500">{{ $message }}</div>
                              @enderror
                  
                              <div class="w-auto mx-auto">
                                    <button type="submit" class="bg-blue-500 rounded-md p-2 px-4 uppercase mt-3">Login</button>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</body>
</html>