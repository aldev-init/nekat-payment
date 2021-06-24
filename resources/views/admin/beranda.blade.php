@extends('admin.layout.layout1')
@section('judul_aplikasi','Nekat Payment Admin')
@section('keterangan','Beranda')
@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$jumlahsiswa}}</h3>

              <p>Siswa Terdaftar</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-friends"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$jumlahkelas}}<sup style="font-size: 20px"></sup></h3>

              <p>Kelas</p>
            </div>
            <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$jumlahjurusan}}</h3>

              <p>Jurusan</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-tie"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$jumlahtransaksi}}</h3>

              <p>Transaksi</p>
            </div>
            <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
    <hr>
    {{-- ekstras --}}

 {{-- jam --}}
 {{-- <div class="container" style="margin-left: 30px;">
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
            <h4>Jam</h4>
            <h3 style="display: inline;" id="jam"></h3><h3 style="display: inline;" id="ket"> Am</h3><br>
            <h5 style="display: inline;" id="menit"></h5>
            <h5 style="display: inline;">:</h5>
            <h5 style="display: inline;" id="detik"></h5>
            </div>
            <div class="icon">
              <i class="fas fa-clock fa-lg"></i>
            </div>
          </div>
        </div>
    </div>
 </div>
 <div class="container" style="margin-left: 700px; margin-top:-30px; padding:0px;">
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
                <h4>Bulan</h4>
                <h2>Januari</h2>
            </div>
            <div class="icon">
              <i class="fas fa-moon fa-lg"></i>
            </div>
          </div>
        </div>
    </div>
 </div> --}}
  </section>


 {{-- javascript --}}
 <script>
     window.setTimeout("waktu()",500);
     function waktu(){
        var waktu = new Date();
        setTimeout("waktu()",500);
        var jam = document.getElementById('jam').innerHTML = waktu.getHours();
        var menit = document.getElementById('menit').innerHTML = waktu.getMinutes();
        var detik = document.getElementById('detik').innerHTML = waktu.getSeconds();
        var ket = document.getElementById('ket').innerHTML = (jam > 12) ? " Pm" : " Am";
     }

     var message  = '{{Session::get("status")}}';
     var exist = '{{Session::has("status")}}';
     if(exist){
         alert(message);
     }
 </script>
@endsection

{{-- masih bug desain
benarkan cepatt --}}
