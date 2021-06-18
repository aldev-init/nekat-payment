@extends('user.layout.loginform')
@section('judul_aplikasi','Nekat Payment')
@section('keterangan','Login Siswa')
@section('button','Login')
@section('hyperlink-button','Register')
@section('link','/register')
@section('action','/login')
@section('content')
<div class="wrap-input100 validate-input" data-validate = "NIS Harus Diisi">
    <input class="input100" type="text" name="nis" placeholder="NIS" autocomplete = "off" autofocus>
    <span class="focus-input100"></span>
    <span class="symbol-input100">
        <i class="fa fa-id-card" aria-hidden="true"></i>
    </span>
</div>

<div class="wrap-input100 validate-input" data-validate = "Password Harus Diisi">
    <input class="input100" type="password" name="password" placeholder="Password" autocomplete = "off">
    <span class="focus-input100"></span>
    <span class="symbol-input100">
        <i class="fa fa-lock" aria-hidden="true"></i>
    </span>
</div>
<div class="text-center p-t-12">
    <span class="txt1">
        Lupa
    </span>
    <a class="txt2" href="#">
        Password?
    </a>
</div>
<script>
    var message = '{{Session::get("login")}}';
    var exist = '{{Session::has("login")}}';
    if(exist){
        alert(message);
    }
</script>
@endsection
