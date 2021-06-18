@extends('admin.layout.loginform')
@section('judul_aplikasi','Nekat Payment')
@section('keterangan','Log-In')
@section('action','/admin/login')
<script>
    var message = '{{Session::get("status")}}';
    var exist  = '{{Session::has("status")}}';

    if(exist){
        alert(message);
    }
</script>
