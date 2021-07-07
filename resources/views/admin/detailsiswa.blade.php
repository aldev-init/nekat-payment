@extends('admin.layout.layout1')
@section('judul_aplikasi','Nekat Payment')
@section('keterangan','Siswa')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{asset('images/logo/iconuser.png')}}"
                   alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{$siswa->nama_lengkap}}</h3>

            <p class="text-muted text-center"><small>{{$siswa->email}}</small></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>NISN</b> <a class="float-right" style="pointer-events: none; cursor: default;">{{$siswa->nisn}}</a>
              </li>
              <li class="list-group-item">
                <b>NIS</b> <a class="float-right" style="pointer-events: none; cursor: default;">{{$siswa->nis}}</a>
              </li>
              {{-- <li class="list-group-item">
                <b>Friends</b> <a class="float-right">13,287</a>
              </li> --}}
            </ul>

            {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tentang Siswa</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong><i class="fas fa-users"></i> Kelas</strong>

            <p class="text-muted">
              {{$siswa->kelas}}
            </p>

            <hr>

            <strong><i class="fas fa-user"></i> Jurusan</strong>

            <p class="text-muted">{{$siswa->jurusan}}</p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

            <p class="text-muted">
              {{$siswa->alamat}}
            </p>

            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Role</strong>

            <p class="text-muted">{{$siswa->role}}</p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Riwayat Transaksi</a></li>
              {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> --}}
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body" style="height: 689px;">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                @foreach ($transaksi as $ts )
                <!-- Post -->
                <div class="post">
                  {{-- <div class="user-block">
                    {{-- <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image"> --}}
                </div>
                <span class="username">
                  <a href="#" style="pointer-events: none; cursor: default;">{{$ts->nama_pembayaran}}</a>
                </span>
                <span class="description" style="margin-left:610px;"><small>{{$ts->created_at}}</small></span>
                  <!-- /.user-block -->
                  <h3 style="margin-top: 20px;">
                    {{$ts->nominal_pembayaran}}
                  </h3>
                  <p style="margin-left: 680px; margin-top:-42px;">{{$ts->bulan}}</p>
                </div>
                <hr>
                @endforeach
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
