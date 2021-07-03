@extends('admin.layout.layout1')
@section('judul_aplikasi', 'Nekat Payment')
@section('keterangan', 'Nominal Pembayaran')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Pembayaran</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="col col-3">Nama Pembayaran</th>
                        <th class="col col-3">Nominal Pembayaran</th>
                        <th class="col col-3">Biaya Admin</th>
                        <th class="col col-5">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <button class="btn btn-success" style="margin-bottom: 5px;" data-toggle="modal"
                        data-target="#tambahpembayaran">Tambah Data Pembayaran</button>
                    @foreach ($nominal as $nml)
                        <tr>
                            <td>{{ $nml->nama_pembayaran }}</td>
                            <td>{{ $nml->nominal_pembayaran }}</td>
                            <td>{{ $nml->biaya_admin }}</td>
                            <td>
                                <div class="action-container" style="margin-left: 30px;">
                                    <button class="btn btn-warning" data-target="#editpembayaran-{{ $nml->id }}"
                                        data-toggle="modal">Ubah</button>
                                    <a href="/admin/nominalpembayaran/delete/{{ $nml->id }}" class="btn btn-danger"
                                        style="margin-left: 40px;">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $nominal->render() }}
        </div>
    </div>

    {{-- popup tambahpembayaran --}}
    <div class="modal fade" id="tambahpembayaran" role="dialog" arialabelledby="modalLabel" area-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Tambah Data Pembayaran
                    <form action="/admin/nominalpembayaran/tambahpembayaran" method="POST">
                        @csrf
                        <input type="text" name="nama_pembayaran" placeholder="Nama Pembayaran...">
                        <input type="text" name="nominal_pembayaran" placeholder="Nominal Pembayaran..."><br>
                        <input type="text" name="biaya_admin" placeholder="Biaya Admin..."><br>
                        <button style="submit" class="btn btn-success" style="margin-top:20px;">Tambah Pembayaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- popup editpembayaran --}}
    @foreach ($nominal as $nml)
        <div class="modal fade" id="editpembayaran-{{ $nml->id }}" role="dialog" arialabelledby="modalLabel"
            area-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        Edit Data Pembayaran
                        <form action="/admin/nominalpembayaran/edit/{{$nml->id}}" method="POST">
                            @csrf
                            <input type="text" name="nama_pembayaran" placeholder="Nama Pembayaran..."
                                value="{{ $nml->nama_pembayaran }}">
                            <input type="text" name="nominal_pembayaran" placeholder="Nominal Pembayaran..."
                                value="{{ $nml->nominal_pembayaran }}"><br>
                            <input type="text" name="biaya_admin" placeholder="Biaya Admin..."
                                value="{{ $nml->biaya_admin }}"><br>
                            <button style="submit" class="btn btn-success" style="margin-top:20px;">Edit Pembayaran</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <!-- /.card -->
@endsection
@section('javascript')
    <script>
        var message = '{{ Session::get('status') }}';
        var exist = '{{ Session::has('status') }}';
        if (exist) {
            alert(message);
        }
    </script>
@endsection
