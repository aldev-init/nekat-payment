
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="/admin/datasiswa/@yield('keterangan')/@yield('id')" method="POST">
        @csrf
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" value="@yield('nama_lengkap')"><br>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email" value="@yield('email')"><br>
        <label for="alamat">Alamat: </label>
        <input type="text" name="alamat" id="alamat" value="@yield('alamat')"><br>
        <label for="nisn">NISN: </label>
        <input type="text" name="nisn" id="nisn" value="@yield('nisn')"><br>
        <label for="nis">NIS: </label>
        <input type="text" name="nis" id="nis" value="@yield('nis')"><br>
        <label for="kelas">Kelas: </label>
        <select name="id_kelas" id="kelas">
            @foreach ($kelas as $kls )
                <option value="{{$kls->id}}" {{( Request::is('admin/datasiswa/editdata/*') && $kls->id == $siswa->id_kelas ? 'selected' : '')}}>{{$kls->kelas}}</option>
            @endforeach
        </select><br>
        <label for="jurusan">Jurusan: </label>
        <select name="id_jurusan" id="jurusan">
            @foreach ($jurusan as $jrsn )
                <option value="{{$jrsn->id}}" {{( Request::is('admin/datasiswa/editdata/*') && $jrsn->id == $siswa->id_jurusan ? 'selected' : '')}}>{{$jrsn->jurusan}}</option>
            @endforeach
        </select><br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" value="@yield('password')"><br>
        <input type="checkbox" id="passwordfeature" onclick="passwordFeature()"> Show Password <br>
        <button type="submit">Submit</button>
    </form>
</body>
<script>
    function passwordFeature(){
        //get element from input checkbox id
        var checkbox = document.getElementById('password').type;
        //condition type input checkbox
        if(checkbox == 'password'){
            document.getElementById('password').type = 'text';
        }else{
            document.getElementById('password').type = 'password';
        }
    }
</script>
</html>
