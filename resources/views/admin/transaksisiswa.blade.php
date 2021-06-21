@extends('admin.layout.layout1')
@section('judul_aplikasi', 'Nekat Payment')
@section('keterangan', 'Riwayat Transaksi Siswa')
@section('content')
    <style>
        body {
            font-family: "lato", sans-serif;
        }

        .container {
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 10px;
            padding-right: 10px;
        }

        h2 {
            font-size: 26px;
            margin: 20px 0;
            text-align: center;
        }

        h2 small {
            font-size: 0.5em;
        }

        .responsive-table li {
            border-radius: 3px;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .responsive-table .table-header {
            background-color: #95a5a6;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .responsive-table .table-row {
            background-color: #ffffff;
            box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
        }

        .responsive-table .col-1 {
            flex-basis: 10%;
        }

        .responsive-table .col-2 {
            flex-basis: 40%;
        }

        .responsive-table .col-3 {
            flex-basis: 25%;
        }

        .responsive-table .col-4 {
            flex-basis: 25%;
        }

        @media all and (max-width: 767px) {
            .responsive-table .table-header {
                display: none;
            }

            .responsive-table li {
                display: block;
            }

            .responsive-table .col {
                flex-basis: 100%;
            }

            .responsive-table .col {
                display: flex;
                padding: 10px 0;
            }

            .responsive-table .col:before {
                color: #6c7a89;
                padding-right: 10px;
                content: attr(data-label);
                flex-basis: 50%;
                text-align: right;
            }
        }

    </style>
    <div class="container">
        {{-- <h2>Responsive Tables Using LI <small>Triggers on 767px</small></h2> --}}
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col">Nama</div>
                <div class="col">Kelas</div>
                <div class="col">Jurusan</div>
                <div class="col">Bulan</div>
                <div class="col">Keterangan</div>
                <div class="col">Jumlah Bayar</div>
                <div class="col">Tanggal/Waktu</div>
            </li>
            @foreach ($data as $dt )
            <li class="table-row">
                <div class="col" data-label="Nama Lengkap">{{$dt->nama_lengkap}}</div>
                <div class="col" data-label="Kelas">{{$dt->kelas}}</div>
                <div class="col" data-label="Jurusan">{{$dt->jurusan}}</div>
                <div class="col" data-label="Bulan">{{$dt->bulan}}</div>
                <div class="col" data-label="Keterangan Pembayaran">{{$dt->nama_pembayaran}}</div>
                <div class="col" data-label="Jumlah Bayar">{{$dt->jumlah_bayar}}</div>
                <div class="col" data-label="Tanggal/Waktu">{{$dt ->created_at}}</div>
            </li>
            @endforeach
        </ul>
    </div>
@endsection
