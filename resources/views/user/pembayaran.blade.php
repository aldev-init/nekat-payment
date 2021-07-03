{{-- @isset($bulan_request, $keteranganpembayaran, $nominalpembayaran_request)
{{dd($bulan_request,$keteranganpembayaran,$nominalpembayaran_request)}}
@endisset --}}
@extends('user.layout.navbartemplate')
@section('judul_aplikasi', 'Nekat Payment')
@section('keterangan', 'Pembayaran')
@section('profilesamping')
@section('css_head')
<link rel="stylesheet" href="{{asset('codesevenalert/build/toastr.css')}}">
@endsection
@section('js_head')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-FjGobZARAFBW189q"></script>
@endsection
@section('content')
    <style>
        .profile {
            margin-left: 700px;
        }

    </style>
    {{-- midtrans js script --}}
    <div class="wrap py-3" style="margin-top: 100px;">
        <div class="container-lg">
            <div class="row d-lg-flex justify-content-center">
                <div class="col-lg-12">

                    <h2>Pembayaran</h2>

                    <!-- <h3>[CARD STYLE]</h3> -->
                    <small class="my-2">
                        <i class="fa fa-chevron-right"></i> Pilih Pembayaran yang akan Anda bayar,
                        lalu tekan tombol <strong><em>Bayar</em></strong>
                        untuk menuju ke proses pembayaran.
                    </small>
                    @foreach ($nominalpembayaran as $nm)
                        @if (explode(' ', $nm->nama_pembayaran)[1] == $kelasuser);
                            <div id="tagihan-list">
                                <div class="card card-tagihan shadow-sm my-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-md-4">
                                                <strong class="text-blue-dark">Pembayaran
                                                    {{ $nm->nama_pembayaran }}</strong> <br>
                                                <small>Tahun 2019/2020, semester 6 - Genap</small>
                                                <hr class="my-1 d-sm-block d-md-none">
                                            </div>
                                            <div class="col-6 col-md-2">
                                                <small class="text-nowrap text-secondary">Tagihan</small>
                                                <p class="mb-0">
                                                    Rp.{{ number_format($nm->nominal_pembayaran, 0, '', ',') }}</p>
                                            </div>
                                            <div class="col-6 col-md-2">
                                                <small class="text-nowrap text-secondary">Biaya Admin</small>
                                                <p class="mb-0">Rp.0</p>
                                            </div>
                                            {{-- <div class="col-6 col-md-2">
                                                <small class="text-nowrap text-secondary">Batas Pembayaran</small>
                                                <p class="mb-0">13-05-2020</p>
                                            </div> --}}
                                            <form action="/pembayaran/bayar" method="POST" id="form">
                                                @csrf
                                                <div class="col-6 col-md-2">
                                                    <small class="text-nowrap text-secondary">Bulan</small>
                                                    <input type="text" name="id_nama" id="idnama" value="{{Auth::user()->id}}" hidden>
                                                    <select name="bulan" id="bulan" class="form-control"
                                                        style="width: 100px;">
                                                        @foreach ($bulan as $bln)
                                                            <option value="{{ $bln->id }}">{{ $bln->bulan }}</option>
                                                        @endforeach
                                                        @if(Session::has('status'))
                                                            <script>
                                                                alert('{{Session::get("status")}}');
                                                            </script>
                                                        @endif
                                                    </select>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input pilih-tagihan"
                                                id="customCheck1">
                                            {{-- <label class="custom-control-label" for="customCheck1"> --}}
                                            <input type="hidden" name="nama_pembayaran" value="{{ $nm->id }}">
                                            <input type="hidden" name="nominal_pembayaran"
                                                value="{{ $nm->nominal_pembayaran }}">
                                            <button type="submit" class="btn btn-block btn-outline-primary">Pilih
                                                Pembayaran</button>
                                            </form>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    {{-- <div class="card card-tagihan shadow-sm my-3    ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <strong class="text-blue-dark">Pembayaran Uang Bangunan</strong> <br>
                                    <small>Tahun 2019/2020, semester 6 - Genap</small>
                                    <hr class="my-1 d-sm-block d-md-none">
                                </div>
                                <div class="col-6 col-md-2">
                                    <small class="text-nowrap text-secondary">Tagihan</small>
                                    <p class="mb-0">Rp.2.500.0000</p>
                                </div>
                                <div class="col-6 col-md-2">
                                    <small class="text-nowrap text-secondary">Biaya Admin</small>
                                    <p class="mb-0">Rp.0</p>
                                </div>
                                <div class="col-6 col-md-2">
                                    <small class="text-nowrap text-secondary">Batas Pembayaran</small>
                                    <p class="mb-0">22-07-2020</p>
                                </div>
                                <div class="col-6 col-md-2">
                                    <small class="text-nowrap text-secondary">Keterangan</small>
                                    <p class="mb-0">Belum Bayar</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input pilih-tagihan" id="customCheck2">
                                <label class="custom-control-label" for="customCheck2">
                                    <span class="border border-info rounded text-info px-2 py-1 pilih-tagihan-label">Pilih Tagihan</span>
                                </label>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="card card-tagihan shadow-sm my-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <strong class="text-blue-dark">Uang Kunjungan Industri</strong> <br>
                                    <small>Tahun 2019/2020, semester 6 - Genap</small>
                                    <hr class="my-1 d-sm-block d-md-none">
                                </div>
                                <div class="col-6 col-md-2">
                                    <small class="text-nowrap text-secondary">Tagihan</small>
                                    <p class="mb-0">Rp.1.100.000</p>
                                </div>
                                <div class="col-6 col-md-2">
                                    <small class="text-nowrap text-secondary">Biaya Admin</small>
                                    <p class="mb-0">Rp.0</p>
                                </div>
                                <div class="col-6 col-md-2">
                                    <small class="text-nowrap text-secondary">Batas Pembayaran</small>
                                    <p class="mb-0">01-09-2020</p>
                                </div>
                                <div class="col-6 col-md-2">
                                    <small class="text-nowrap text-secondary">Keterangan</small>
                                    <p class="mb-0">Belum Bayar</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input pilih-tagihan" id="customCheck3">
                                <label class="custom-control-label" for="customCheck3">
                                    <span class="border border-info rounded text-info px-2 py-1 pilih-tagihan-label">Pilih Tagihan</span>
                                </label>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <button id="pay-button" class="btn btn-block btn-primary" name="submit"
                            style="width: 100px; margin-left:-40px;">
                            Bayar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



    {{-- Hidden Request --}}
    {{-- @isset($bulan_request, $keteranganpembayaran, $nominalpembayaran_request)
    <form action="/pembayaran/selesai" method="POST" id="hiddenrequest">
        <input type="text" name="nama_pembayaran" value="{{$keteranganpembayaran}}" hidden>
        <input type="text" name="nominal_pembayaran" value="{{$nominalpembayaran_request}}" hidden>
        <input type="text" name="bulan" value="{{$bulan_request}}" hidden>
        <button type="submit" onclick="request()" hidden></button>
    </form>
    <script type="text/javascript">
    @endisset --}}
    <script src="{{asset('codesevenalert/toastr.js')}}"></script>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        // For example trigger on button clicked, or any time you need
        payButton.addEventListener('click', function() {
            @isset($snapToken)
                window.snap.pay('{{ $snapToken }}', {
                onSuccess: function() {
                window.location.href =
                '{{ route('selesai', ['bulan' => $bulan_request, 'nama' => $keteranganpembayaran, 'nominal' => $nominalpembayaran_request]) }}';
                },
                onError: function() {
                alert('Maaf Terjadi Kesalahan,Mohon coba Kembali dalam 1-2 Menit');
                }
                });
            @endisset
            window.snap.pay('SNAP_TRANSACTION_TOKEN'); // Replace it with your transaction token
        });
    </script>
@endsection
{{-- Tambahkan Alert MEnarik --}}
