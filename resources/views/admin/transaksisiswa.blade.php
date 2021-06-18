@extends('admin.layout.layout1')
@section('judul_aplikasi','Nekat Payment Admin')
@section('keterangan','Riwayat Transaksi Siswa')
@section('content')
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://fontawesome.com/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/main.css">
<!--===============================================================================================-->
<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <h2>Riwayat Transaksi Siswa</h2>
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Tanggal</th>
                            <th class="column2">Pembayaran</th>
                            <th class="column3">Nama</th>
                            <th class="column4">harga</th>
                            <th class="column5">Jumlah</th>
                            <th class="column6">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td class="column1">2019-09-29 01:22</td>
                                <td class="column2">SPP</td>
                                <td class="column3">Arianti Apriani S</td>
                                <td class="column4">Rp. 300.000</td>
                                <td class="column5">3</td>
                                <td class="column6">Rp. 900.000</td>
                            </tr>
                            <tr>
                                <td class="column1">2019-09-28 05:57</td>
                                <td class="column2">SPP</td>
                                <td class="column3">Tiara Situmorang</td>
                                <td class="column4">Rp. 300.000</td>
                                <td class="column5">4</td>
                                <td class="column6">Rp.1.200.000</td>
                            </tr>
                            <tr>
                                <td class="column1">2019-09-26 05:57</td>
                                <td class="column2">SPP</td>
                                <td class="column3">Raqhin Kusmanadinata</td>
                                <td class="column4">Rp.300.000</td>r
                                <td class="column5">2</td>
                                <td class="column6">Rp.600.000</td>
                            </tr>
                            <tr>
                                <td class="column1">2019-09-25 23:06</td>
                                <td class="column2">SPP</td>
                                <td class="column3">Ajeng Nurfadillah</td>
                                <td class="column4">Rp. 300.000</td>
                                <td class="column5">3</td>
                                <td class="column6">Rp.900.000</td>
                            </tr>
                            <tr>
                                <td class="column1">2019-09-24 05:57</td>
                                <td class="column2">SPP</td>
                                <td class="column3">Nadia Hertisa</td>
                                <td class="column4">RP.300.000</td>
                                <td class="column5">6</td>
                                <td class="column6">Rp.1.800.000</td>
                            </tr>
                            <tr>
                                <td class="column1">2019-09-23 05:57</td>
                                <td class="column2">SPP</td>
                                <td class="column3">Ajeng Riani</td>
                                <td class="column4">Rp.300.000</td>
                                <td class="column5">1</td>
                                <td class="column6">Rp.300.000</td>
                            </tr>
                            <tr>
                                <td class="column1">2019-09-22 05:57</td>
                                <td class="column2">SPP</td>
                                <td class="column3">Muhammad Alghifari</td>
                                <td class="column4">RP.300.000</td>
                                <td class="column5">1</td>
                                <td class="column6">Rp.300.000</td>
                            </tr>
                            <tr>
                                <td class="column1">2019-09-21 05:57</td>
                                <td class="column2">SPP</td>
                                <td class="column3">Firda Nurhaliza</td>
                                <td class="column4">Rp. 300.000</td>
                                <td class="column5">1</td>
                                <td class="column6">Rp.300.000</td>
                            </tr>
                            <tr>
                                <td class="column1">2019-09-19 05:57</td>
                                <td class="column2">SPP</td>
                                <td class="column3">Fadly Ismail</td>
                                <td class="column4">Rp.300.000</td>
                                <td class="column5">1</td>
                                <td class="column6">Rp.300.000</td>
                            </tr>
                            <tr>
                                <td class="column1">2019-09-18 05:57</td>
                                <td class="column2">SPP</td>
                                <td class="column3">Ziddan Zibran</td>
                                <td class="column4">Rp.300.000</td>
                                <td class="column5">1</td>
                                <td class="column6">Rp.300.000</td>
                            </tr>
                            <tr>
                                <td class="column1">2019-09-22 05:57</td>
                                <td class="column2">SPP</td>
                                <td class="column3">Neng Verawaty</td>
                                <td class="column4">Rp.300.000</td>
                                <td class="column5">1</td>
                                <td class="column6">Rp.3000.000</td>
                            </tr>
                            <tr>
                                <td class="column1">2019-09-21 05:57</td>
                                <td class="column2">SPP</td>
                                <td class="column3">Andi Ariefin</td>
                                <td class="column4">Rp.300.000</td>
                                <td class="column5">1</td>
                                <td class="column6">Rp.300.000</td>
                            </tr>
                            <tr>
                                <td class="column1">2019-09-19 05:57</td>
                                <td class="column2">SPP</td>
                                <td class="column3">Legio Rivahel</td>
                                <td class="column4">Rp.300.000</td>
                                <td class="column5">1</td>
                                <td class="column6">Rp.300.000</td>
                            </tr>
                            <tr>
                                <td class="column1">2019-09-18 05:57</td>
                                <td class="column2">SPP</td>
                                <td class="column3">Muhammad Rifki Janjani</td>
                                <td class="column4">Rp.300.000</td>
                                <td class="column5">1</td>
                                <td class="column6">Rp.300.000</td>
                            </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--===============================================================================================-->
<script src="{{asset('vendor')}}/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor')}}/bootstrap/js/popper.js"></script>
<script src="{{asset('vendor')}}/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor')}}/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('js')}}/main.js"></script>
@endsection
