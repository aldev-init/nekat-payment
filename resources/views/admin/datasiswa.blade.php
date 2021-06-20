@extends('admin.layout.layout1')
@section('judul_aplikasi','Nekat Payment')
@section('keterangan','Data Siswa')
@section('content')
<style>
    .action-container{
        display: inline;
    }
</style>
<div class="wrapper">

    <!-- Main Sidebar Container -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Siswa</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <button class="btn btn-block btn-success" data-target="#tambahdata" data-toggle="modal"style="width: 150px; margin-bottom:10px;">Tambah Data</button>
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>Kelas</th>
                      <th>Jurusan</th>
                      <th>NISN</th>
                      <th>NIS</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ( $data as $dt )
                    <tr>
                        <td>{{$dt->nama_lengkap}}</td>
                        <td>{{$dt->email}}</td>
                        <td>{{$dt->alamat}}</td>
                        <td>{{$dt->kelas}}</td>
                        <td>{{$dt->jurusan}}</td>
                        <td>{{$dt->nisn}}</td>
                        <td>{{$dt->nis}}</td>
                        <td>
                            <div class="action-container">
                                <button data-target="#editdata-{{$dt->id}}" data-toggle="modal" class="btn btn-block btn-xs btn-warning">Ubah</button>
                                <a href="/admin/datasiswa/delete/{{$dt->id}}" class="btn btn-block btn-xs btn-danger">Hapus</a>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                    {{-- <tr>
                      <td>Rizqi MS</td>
                      <td>ms@gmail.com</td>
                      <td>Parken</td>
                      <td>XI RPL 1</td>
                      <td>Rekayasa Perangkat Lunak</td>
                      <td>19202034</td>
                      <td>2010886</td>
                    </tr>
                    <tr>
                      <td>Raqhin Kusmanadinata </td>
                      <td>radhin@gmail.com</td>
                      <td>Parken</td>
                      <td>XI RPL 1</td>
                      <td>Rekayasa Perangkat Lunak</td>
                      <td>192010567</td>
                      <td>2010765</td>
                    </tr>
                    <tr>
                      <td>Ajeng Nur Fadillah</td>
                      <td>ajengnur@gmail.com</td>
                      <td>Cibaduyut</td>
                      <td>Rekayasa Perangkat Lunak</td>
                      <td>XI RPL 1</td>
                      <td>192010544</td>
                      <td>20103267</td>
                    </tr>
                    <tr>
                      <td>Nadia Hertisa</td>
                      <td>ndhrtsa@gmail.com</td>
                      <td>Permata Kopo</td>
                      <td>XI RPL 1</td>
                      <td>Rekayasa Perangkat Lunak</td>
                      <td>192010545</td>
                      <td>20103456</td>
                    </tr>
                    <tr>
                      <td>Muhammad Alghifari</td>
                      <td>alghifari@gmail.com</td>
                      <td>Parken</td>
                      <td>XI RPL 1</td>
                      <td>Rekayasa Perangkat</td>
                      <td>19201022</td>
                      <td>2030100</td>
                    </tr>
                    <tr>
                      <td>Tiara Situmorang</td>
                      <td>tiarastmrng@gmail.com</td>
                      <td>Kp.Pamoyanan</td>
                      <td>XI RPL 1</td>
                      <td>Rekayasa Perangkat Lunak</td>
                      <td>192010533</td>
                      <td>20101020</td>
                    </tr>
                    <tr>
                      <td>Arianti Apriani Sagita</td>
                      <td>ariantiaas@gmail.com</td>
                      <td>Kp. Pasanggrahan</td>
                      <td>XI RPL 1</td>
                      <td>Rekayasa Perangkat Lunak</td>
                      <td>2973829479</td>
                      <td>945037740</td>
                    </tr> --}}
                    </tbody>
                    {{-- <tfoot>
                    <tr>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>Kelas</th>
                      <th>Jurusan</th>
                      <th>NISN</th>
                      <th>NIS</th>
                    </tr>
                    </tfoot> --}}
                  </table>
                  {{-- <div class="box-footer clearfix">
                    {{$pagination->links()}}
                  </div> --}}
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->


                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
@endsection
@section('javascript')
<script>
    var message = '{{Session::get("alert")}}';
    var exist = '{{Session::has("alert")}}';
    if(exist){
        alert(message);
    }
</script>
{{-- <script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('template')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('template')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('template')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template')}}/dist/js/demo.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script> --}}

{{-- popup Tambah data --}}
<div class="modal" id="tambahdata" role="dialog" arialabelledby="modalLabel" area-hidden="true" style="width: 50%;margin-left:345px; margin-top:65px;overflow:hidden;">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Siswa</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="/admin/datasiswa/tambahdata" method="POST">
        @csrf
          <div class="card-body">
            <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="namalengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namalengkap" placeholder="Masukan nama lengkap" name="nama_lengkap">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="Masukan alamat" name="alamat">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" placeholder="Masukan NIS" name="nis">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="id_kelas">Kelas</label>
                        <select name="id_kelas" id="id_kelas" class="form-control">
                            @foreach ($kelas as $kls )
                                <option value="{{$kls->id}}">{{$kls->kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" id="nisn" placeholder="Masukan NISN" name="nisn">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="id_jurusan">Jurusan</label>
                        <select name="id_jurusan" id="id_jurusan" class="form-control">
                            @foreach ($jurusan as $jrsn )
                                <option value="{{$jrsn->id}}">{{$jrsn->jurusan}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Masukan Email" name="email">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukan password" name="password">
                        <input type="checkbox" onclick="passwordFeature()">Show Password
                    </div>
                </div>
            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-right">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>
            </div>
        </>
          {{-- <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
          </div> --}}
          {{-- <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div> --}}
        </div>
        <!-- /.card-body -->
      </form>
    </div>
</div>

{{-- popup editdata --}}
@foreach ($data as $dt )
<div class="modal" id="editdata-{{$dt->id}}" role="dialog" arialabelledby="modalLabel" area-hidden="true" style="width: 50%;margin-left:345px; margin-top:65px;overflow:hidden;">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Siswa</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="/admin/datasiswa/editdata/{{$dt->id}}" method="POST">
        @csrf
          <div class="card-body">
            <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="namalengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namalengkap" placeholder="Masukan nama lengkap" name="nama_lengkap" value="{{$dt->nama_lengkap}}">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="Masukan alamat" name="alamat" value="{{$dt->alamat}}">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" placeholder="Masukan NIS" name="nis" value="{{$dt->nis}}">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="id_kelas">Kelas</label>
                        <select name="id_kelas" id="id_kelas" class="form-control">
                            @foreach ($kelas as $kls )
                                <option value="{{$kls->id}}" {{($dt->id_kelas == $kls->id) ? 'selected':''}}>{{$kls->kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" id="nisn" placeholder="Masukan NISN" name="nisn" value="{{$dt->nisn}}">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="id_jurusan">Jurusan</label>
                        <select name="id_jurusan" id="id_jurusan" class="form-control">
                            @foreach ($jurusan as $jrsn )
                                <option value="{{$jrsn->id}}" {{($jrsn->id == $dt->id_jurusan) ? 'selected':''}}>{{$jrsn->jurusan}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Masukan Email" name="email" value="{{$dt->email}}">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukan password" name="password" value="{{$dt->password}}">
                        <input type="checkbox" onclick="passwordFeature()">Show Password
                    </div>
                </div>
            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-right">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Edit Data</button>
                    </div>
                </div>
            </div>
        </>
          {{-- <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
          </div> --}}
          {{-- <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div> --}}
        </div>
        <!-- /.card-body -->
      </form>
    </div>
</div>
@endforeach
@endsection
@section('javascript')
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
@endsection
