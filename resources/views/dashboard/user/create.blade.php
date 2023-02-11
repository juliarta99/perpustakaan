<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>{{ $title }}</title>
</head>
<body>
      <form action="/dashboard/user" method="post">
            @csrf
            <label for="idPengguna">Id Pengguna</label>
            <input type="text" name="kode" id="kode">

            <label for="name">Name</label>
            <input type="text" name="name" id="name">

            <label for="l">Laki Laki</label>
            <input type="radio" name="jk" id="l" value="l">

            <label for="p">Perempuan</label>
            <input type="radio" name="jk" id="p" value="p">

            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan">
            
            <label for="no_telp">Nomor HP</label>
            <input type="tel" name="no_telp" id="no_telp">

            <label for="alamat">alamat</label>
            <input type="alamat" name="alamat" id="alamat">
            
            <label for="password">Password</label>
            <input type="password" name="password" id="password">

            <button type="submit">Login</button>
      </form>
</body>
</html>