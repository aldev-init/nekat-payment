<?php
$year = date('Y');
?>
@extends('admin.layout.layout1')
@section('judul_aplikasi','Nekat Payment')
@section('keterangan','Rekap Data')
@section('content')
<div class="card">
    <div class="card-header">
      <form action="/admin/rekap/custom/" method="POST">
        @csrf
        <select name="kelas" id="kelas" class="form-control" style="width: 100px;">
            @foreach ($kelas as $kls )
            <option value="{{$kls->id}}" {{$oldkelas == $kls->id  ? 'selected':''}}>{{$kls->kelas}}</option>
            @endforeach
        </select>
        {{-- if variable oldkelas is set --}}
        @isset($oldkelas)
        <select name="nama_lengkap" id="namalengkap" class="form-control" style="width: 100px; margin-left:110px; margin-top:-38px;">
            @foreach ($siswakelas as $sk )
                <option value="{{$sk->nama_lengkap}}">{{$sk->nama_lengkap}}</option>
            @endforeach
        </select>
        @endisset
        <select name="semester" id="semester" class="form-control" style="width: 140px; float:right; margin-top:-40px; margin-left:-40px;">
            <option value="semester1" {{$oldsemester == 'semester1' ? 'selected' : ''}}>Semester 1</option>
            <option value="semester2" {{$oldsemester == 'semester2' ? 'selected' : ''}}>Semester 2</option>
        </select>
        <select name="tahun" id="tahun" class="form-control" style="width: 100px; float: right; margin-right:150px; margin-top:-40px;">
            @for ($i=2021;$i<=$year;$i++)
            <option value="{{$i}}" {{$oldtahun == $i ? 'selected' : ''}}>{{$i}}</option>
            @endfor
        </select>
        <button class="btn btn-success" style="margin-left: 440px; margin-top:-70px;" value="custom" name="apply">Apply</button>
        <a href="/admin/rekap" class="btn btn-warning" style="margin-top: -70px;">Reset</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Jurusan</th>
          <th>Bulan</th>
          <th>Ket.Pembayaran</th>
          <th>Jmlh.Bayar</th>
          <th>Tanggal/Waktu</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $dt )
        <tr>
            <td>{{$dt->nama_lengkap}}</td>
            <td>{{$dt->kelas}}</td>
            <td>{{$dt->jurusan}}</td>
            <td>{{$dt->bulan}}</td>
            <td>{{$dt->nama_pembayaran}}</td>
            <td>{{$dt->nominal_pembayaran}}</td>
            <td>{{$dt->created_at}}</td>
          </tr>
        @endforeach
        </tfoot>
      </table>
      <button type="submit" class="nav-link btn btn-info btn-xs" value="pdf" name="pdf" formtarget="_blank">Print PDF</button>
    </form>
      <div class="container" style="margin-left:900px; margin-top:-20px;">
        {{$data->render()}}
      </div>
    </div>
    <!-- /.card-body -->
  </div>

  {{-- popup panduan Rekap PDF --}}
  <div class="modal fade" id="panduanrekappdf">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Panduan Rekap PDF</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika Data Pada PDF Tidak Muncul,Pilih Terlebih Dahulu Kelas/Tahun/Semester</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection
