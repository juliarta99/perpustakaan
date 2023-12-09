<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
      <title>{{ $title }}</title>
      @vite('resources/css/app.css')
</head>
<body class="font-poppins">
      @include('layouts.header')
      @include('layouts.sidebar')
      @yield('content')
      @include('layouts.footer')
</body>
<script src="{{ asset('js/script.js') }}"></script>
</html>