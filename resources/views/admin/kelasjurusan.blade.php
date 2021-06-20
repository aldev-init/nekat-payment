@extends('admin.layout.layout1')
@section('judul_aplikasi', 'Nekat Payment')
@section('keterangan', 'Data Kelas Dan Jurusan')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/tambah data.css') }}">
    <div class="table-title">
        <h3>Data Kelas dan Jurusan</h3>
    </div>
    <table border="1" cellspacing="0" class="scroll table-1" align="left" cellpadding="2">
        <thead>
            <tr>
                <th class="text-left">Kelas</th>
                <th class="text-left"><button data-target="#tambahkelas" data-toggle="modal">Tambah Kelas</button></th>
            </tr>
        </thead>
        <tbody class="table-hover">
            @foreach ($kelas as $kls)
                <tr>
                    <td class="text-left">{{ $kls->kelas }}</td>
                    <td class="text-left">
                        <a class="btn third" float="right" href="/admin/kelas/delete/{{ $kls->id }}">Hapus</a>
                        <button class="btn third" float="right" data-target="#editkelas-{{$kls->id}}" data-toggle="modal">Ubah</button>
                    </td>
                </tr>
            @endforeach

            {{-- popup tambahkelas --}}
            <div class="modal fade" id="tambahkelas" role="dialog" arialabelledby="modalLabel" area-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            Tambah Data Kelas
                            <form action="/admin/kelas/tambahkelas" method="POST">
                                @csrf
                                <input type="text" name="kelas">
                                <button style="submit">Tambah Kelas</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($kelas as $kls )
            <div class="modal fade" id="editkelas-{{$kls->id}}" role="dialog" arialabelledby="modalLabel" area-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            Edit Data Kelas
                            <form action="/admin/kelas/edit/{{$kls->id}}" method="POST">
                                @csrf
                                <input type="text" name="kelas" value="{{$kls->kelas}}">
                                <button style="submit">Tambah Kelas</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
    </table>




    <table border="1" cellspacing="0" class="scroll table-2" align="center" cellpadding="2">
        <thead>
            <tr>
                <th class="text-left">Jurusan</th>
                <th class="text-left"><button data-target="#tambahjurusan" data-toggle="modal">Tambah Jurusan</button></th>
            </tr>
        </thead>
        <tbody class="table-hover">
            @foreach ($jurusan as $jrsn)
                <tr>
                    <td class="text-left">{{ $jrsn->jurusan }}</td>
                    <td class="text-left">
                        <a class="btn third" float="right" href="/admin/jurusan/delete/{{ $jrsn->id }}">Hapus</a>
                        <button class="btn third" float="right" data-target="#editjurusan-{{ $jrsn->id }}"
                            data-toggle="modal">Ubah</button>
                    </td>
                </tr>
            @endforeach

            {{-- popup tambahjurusan --}}
            <div class="modal fade" id="tambahjurusan" role="dialog" arialabelledby="modalLabel" area-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            Tambah Data Jurusan
                            <form action="/admin/jurusan/tambahjurusan" method="POST">
                                @csrf
                                <input type="text" name="jurusan" value="{{ $jrsn->jurusan }}">
                                <button style="submit">Tambah Jurusan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($jurusan as $jrsn)
                {{-- popup editjurusan --}}
                <div class="modal fade" id="editjurusan-{{ $jrsn->id }}" role="dialog" arialabelledby="modalLabel"
                    area-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                Tambah Data Jurusan
                                <form action="/admin/jurusan/edit/{{$jrsn->id}}" method="POST">
                                    @csrf
                                    <input type="text" name="jurusan" value="{{ $jrsn->jurusan }}">
                                    <button style="submit">Edit Jurusan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </table>
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
