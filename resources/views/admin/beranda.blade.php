@extends('admin.layout.layout1')
@section('judul_aplikasi', 'Nekat Payment Admin')
@section('keterangan', 'Beranda')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jumlahsiswa }}</h3>

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
                            <h3>{{ $jumlahkelas }}<sup style="font-size: 20px"></sup></h3>

                            <p>Total Kelas</p>
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
                            <h3>{{ $jumlahjurusan }}</h3>

                            <p>Total Jurusan</p>
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
                            <h3>{{ $jumlahtransaksi }}</h3>

                            <p>Total Transaksi</p>
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

        <section class="content pb-3">
            <div class="container-fluid h-100">
              <div class="card card-row card-primary">
                <div class="card-header">
                    <div class="card-tools">
                        <button class="btn btn-success btn-xs" data-target="#tambahtodo" data-toggle="modal">Add</button>
                    </div>
                  <h3 class="card-title">
                    To Do
                  </h3>
                </div>
                <div class="card-body">
                @foreach ($todo as $td )
                <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h5 class="card-title">{{$td->nama_kegiatan}}</h5>
                      <div class="card-tools">
                        <a href="/admin/todo/delete/{{$td->id}}" class="btn btn-tool btn-link">Hapus</a>
                        <a href="/admin/todo/selesai/{{$td->id}}" class="btn btn-tool">Selesai</a>
                      </div>
                    </div>
                  </div>
                @endforeach
                </div>
              </div>
              <div class="card card-row card-success">
                <div class="card-header">
                    <div class="card-tools">
                        {{$todoselesai->render()}}
                    </div>
                  <h3 class="card-title">
                    Done
                  </h3>
                </div>
                <div class="card-body">
                  @foreach ($todoselesai as $tds )
                  <div class="card card-success card-outline">
                    <div class="card-header">
                      <h5 class="card-title">{{$tds->nama_kegiatan}}</h5>
                      <div class="card-tools">
                        {{-- <a href="#" class="btn btn-tool btn-link"></a>
                        <a href="#" class="btn btn-tool">
                          <i class="fas fa-pen"></i>
                        </a> --}}
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </section>
    </section>



    {{-- Popup Tambah Kegiatan --}}
    <div class="modal fade" id="tambahtodo">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <form action="/admin/todo/tambah" method="POST">
                @csrf
                <h4 class="modal-title">TODO LIST</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body">
                <input type="text" class="form-control" name="nama_kegiatan" placeholder="TODO...">
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    {{-- javascript --}}
    <script>

        window.setTimeout("waktu()", 500);

        function waktu() {
            var waktu = new Date();
            setTimeout("waktu()", 500);
            var jam = document.getElementById('jam').innerHTML = waktu.getHours();
            var menit = document.getElementById('menit').innerHTML = waktu.getMinutes();
            var detik = document.getElementById('detik').innerHTML = waktu.getSeconds();
            var ket = document.getElementById('ket').innerHTML = (jam > 12) ? " Pm" : " Am";
        }

        var message = '{{ Session::get('status') }}';
        var exist = '{{ Session::has('status') }}';
        if (exist) {
            alert(message);
        }
    </script>
@endsection

{{-- masih bug desain
benarkan cepatt --}}
