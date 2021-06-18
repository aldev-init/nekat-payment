@extends('user.layout.loginform')
@section('judul_aplikasi','Nekat Payment')
@section('keterangan','Register')
@section('button','Register')
@section('hyperlink-button','Login')
@section('link','/login')
@section('action','/register')
@section('content')
<div class="wrap-input100 validate-input">
    <input class="input100" type="text" name="nickname" placeholder="Nickname" value="{{old('nickname')}}" autocomplete = "off">
    <span class="symbol-input100">
        <i class="fa fa-id-card" aria-hidden="true"></i>
    </span>
</div>
<div class="wrap-input100 validate-input">
    <input class="input100" type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="{{old('nama_lengkap')}}" autocomplete = "off">
    <span class="symbol-input100">
        <i class="fa fa-id-card" aria-hidden="true"></i>
    </span>
</div>
<div class="wrap-input100 validate-input">
    <input class="input100" type="text" name="email" placeholder="Email" value="{{old('email')}}" autocomplete = "off">
    <span class="symbol-input100">
        <i class="fa fa-envelope" aria-hidden="true"></i>
    </span>
</div>
<div class="wrap-input100 validate-input">
    <input class="input100" type="text" name="alamat" placeholder="alamat" value="{{old('alamat')}}" autocomplete = "off">
    <span class="symbol-input100">
        <i class="fa fa-map" aria-hidden="true"></i>
    </span>
</div>
<div class="wrap-input100 validate-input">
    <input class="input100 is-invalid" type="text" name="nis" placeholder="Nis" value="{{old('nis')}}" autocomplete = "off">
    <span class="symbol-input100">
        <i class="fa fa-user-circle" aria-hidden="true"></i>
    </span>
    @error('nis')
    <p style="color: red;">NIS Sudah digunakan</p>
    @enderror
</div>
<div class="wrap-input100 validate-input">
    <input class="input100" type="text" name="nisn" placeholder="Nisn" value="{{old('nisn')}}" autocomplete = "off">
    <span class="symbol-input100">
        <i class="fa fa-user-circle" aria-hidden="true"></i>
    </span>
    @error('nisn')
    <p style="color: red;">NISN Sudah digunakan</p>
    @enderror
</div>
<div class="wrap-input100 validate-input">
    <input class="input100" type="password" name="password" placeholder="Password" value="{{old('password')}}" autocomplete = "off">
    <span class="symbol-input100">
        <i class="fa fa-user-circle" aria-hidden="true"></i>
    </span>
</div>
<div class="container" style="margin-left: 20px">
    <div class="wrap-input100 validate-input">
        <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" value="{{old('jenis_kelamin')}}">
        <label for="jenis_kelamin">Laki-Laki</label>
        <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" value="{{old('jenis_kelamin')}}">
        <label for="jenis_kelamin">Perempuan</label>
    </div>
</div>
<div class="container" style="text-align: center">
    <select name="id_kelas" id="kelas">
        @foreach ($kelas as $kls )
        <option value="{{$kls->id}}">{{$kls->kelas}}</option>
        @endforeach
    </select>

    <select name="id_jurusan" id="kelas">
        @foreach ($jurusan as $jrs )
        <option value="{{$jrs->id}}">{{$jrs->jurusan}}</option>
        @endforeach
    </select>
</div>
@endsection
{{-- masih stuck di register user
desainnya --}}
