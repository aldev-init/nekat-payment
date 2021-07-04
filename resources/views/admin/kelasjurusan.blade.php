@extends('admin.layout.layout1')
@section('judul_aplikasi', 'Nekat Payment')
@section('keterangan', 'Data Kelas Dan Jurusan')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Kelas</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" data-target="#tambahkelas" data-toggle="modal">Tambah Data
                                Kelas</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelas as $kls)
                                    <tr>
                                        <td>{{ $kls->kelas }}</td>
                                        <td>
                                            <a class="btn third btn-danger" float="right"
                                                href="/admin/kelas/delete/{{ $kls->id }}">Hapus</a>
                                            <button class="btn third btn-warning" float="right"
                                                data-target="#editkelas-{{ $kls->id }}"
                                                data-toggle="modal">Ubah</button>
                                        </td>
                                    </tr>
                                @endforeach

                                {{-- popup tambahkelas --}}
                                <div class="modal fade" id="tambahkelas" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                Tambah Data Kelas
                                                <form action="/admin/kelas/tambahkelas" method="POST">
                                                    @csrf
                                                    <input type="text" name="kelas">
                                                    <button style="submit" class="btn btn-success btn-sm">Tambah Kelas</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Popup Edit Kelas --}}
                                @foreach ($kelas as $kls)
                                    <div class="modal fade" id="editkelas-{{ $kls->id }}" role="dialog"
                                        arialabelledby="modalLabel" area-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    Edit Data Kelas
                                                    <form action="/admin/kelas/edit/{{ $kls->id }}" method="POST">
                                                        @csrf
                                                        <input type="text" name="kelas" value="{{ $kls->kelas }}">
                                                        <button style="submit" class="btn btn-warning btn-sm">Edit Kelas</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $kelas->render() }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Jurusan</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" data-target="#tambahjurusan" data-toggle="modal">Tambah Data
                                Jurusan</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jurusan as $jrsn)
                                    <tr>
                                        <td>{{ $jrsn->jurusan }}</td>
                                        <td>
                                            <a class="btn third btn-danger" float="right"
                                                href="/admin/jurusan/delete/{{ $jrsn->id }}">Hapus</a>
                                            <button class="btn third btn-warning" float="right"
                                                data-target="#editjurusan-{{ $jrsn->id }}"
                                                data-toggle="modal">Ubah</button>
                                        </td>
                                    </tr>
                                @endforeach

                                {{-- popup tambahjurusan --}}
                                <div class="modal fade" id="tambahjurusan" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                Tambah Data Jurusan
                                                <form action="/admin/jurusan/tambahjurusan" method="POST">
                                                    @csrf
                                                    <input type="text" name="jurusan">
                                                    <button style="submit" class="btn btn-success btn-sm">Tambah Jurusan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @foreach ($jurusan as $jrsn)
                                    {{-- popup editjurusan --}}
                                    <div class="modal fade" id="editjurusan-{{ $jrsn->id }}" role="dialog"
                                        arialabelledby="modalLabel" area-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    Tambah Data Jurusan
                                                    <form action="/admin/jurusan/edit/{{ $jrsn->id }}" method="POST">
                                                        @csrf
                                                        <input type="text" name="jurusan" value="{{ $jrsn->jurusan }}">
                                                        <button style="submit" class="btn btn-warning btn-sm">Edit Jurusan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{$jurusan->render()}}
                    </div>
                </div>
            </div>
        </div>


    @endsection
    @section('javascript')
        <script>
            var message = '{{ Session::get('status') }}';
            var exist = '{{ Session::has('status') }}';
            //edit
            if (exist && message === 'Data Berhasil Diubah') {
                toastr.success(message);
            }
            if(exist && message === 'Data Gagal Diubah'){
                toastr.error(message);
            }
            //hapus
            if(exist && message === 'Data Berhasil Dihapus'){
                toastr.success(message);
            }
            if(exist && message === 'Data Gagal Dihapus'){
                toastr.error(message);
            }
            //tambah
            if(exist && message === 'Tambah Data Kelas Berhasil' || message === 'Tambah Data Jurusan Berhasil'){
                toastr.success(message);
            }
        </script>
    @endsection
