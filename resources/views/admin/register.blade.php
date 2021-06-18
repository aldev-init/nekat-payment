@extends('admin.layout.loginform')
@section('judul_aplikasi','Nekat Payment')
@section('keterangan','Register')
@section('action','/admin/register')
@section('method','POST')
@section('new_form')
<div class="form-group d-flex">
    <input type="password" class="form-control rounded-left" placeholder="Confirm Password..." name="confirmpassword">
</div>
  @error('confirmpassword')
  <p>Password Tidak Sama</p>
  @enderror
@endsection
