@extends('user.layout.navbartemplate');
@section('judul_aplikasi','Nekat Payment')
@section('keterangan','Pembayaran')
@section('profilesamping')
@section('content')
<style>
    .profile{
        margin-left: 700px;
    }
</style>
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

                <div id="tagihan-list">
                    <div class="card card-tagihan shadow-sm my-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <strong class="text-blue-dark">Pembayaran SPP</strong> <br>
                                    <small>Tahun 2019/2020, semester 6 - Genap</small>
                                    <hr class="my-1 d-sm-block d-md-none">
                                </div>
                                <div class="col-6 col-md-2">
                                    <small class="text-nowrap text-secondary">Tagihan</small>
                                    <p class="mb-0">Rp.300.000</p>
                                </div>
                                <div class="col-6 col-md-2">
                                    <small class="text-nowrap text-secondary">Biaya Admin</small>
                                    <p class="mb-0">Rp.0</p>
                                </div>
                                <div class="col-6 col-md-2">
                                    <small class="text-nowrap text-secondary">Batas Pembayaran</small>
                                    <p class="mb-0">13-05-2020</p>
                                </div>
                                <div class="col-6 col-md-2">
                                    <small class="text-nowrap text-secondary">Keterangan</small>
                                    <p class="mb-0">Belum Bayar</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input pilih-tagihan" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">
                                    <span class="border border-info rounded text-info px-2 py-1 pilih-tagihan-label">Pilih Tagihan</span>
                                </label>
                            </div>
                        </div>
                    </div>

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
                        <button type="button" id="submit-tagihan" class="btn btn-block btn-primary" name="submit">
                            Bayar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="information-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="loading">
                    <i class="fa fa-spinner fa-spin"></i> Sedang memuat...
                </p>
                <div class="row" id="tagihan-terpilih" style="display: none;">
                    <div class="col-md-6 mb-2">
                        <p class="text-blue-dark">
                            <strong>2 Tagihan terpilih.</strong>
                        </p>
                        <strong class="mb-0">Item Tagihan Satu</strong>
                        <p class="py-0 mb-0"><small>Tahun 2019/2020, semester 6 - Genap</small></p>
                        <div class="callout callout-default py-1 mb-2 border-top-0 border-right-0 border-bottom-0">
                            Sebesar: <small class="align-top text-secondary">Rp</small>1.400.000
                        </div>

                        <strong class="mb-0">Item Tagihan Dua</strong>
                        <p class="py-0 mb-0"><small>Tahun 2019/2020, semester 6 - Genap</small></p>
                        <div class="callout callout-default py-1 mb-2 border-top-0 border-right-0 border-bottom-0">
                            Sebesar: <small class="align-top text-secondary">Rp</small>300.000
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="callout callout-info py-1 mb-2 border-top-0 border-right-0 border-bottom-0">
                            <h5 class="mb-3">Total Pembayaran</h5>
                            <p class="lead mb-0">
                                <small class="align-top text-secondary">Rp</small>1.700.000
                            </p>
                            <small>
                                <span class="text-secondary">Terbilang: </span>
                                <em>Satu Juta Tujuh Ratus Ribu Rupiah</em>
                            </small>

                            <p>
                                <div class="form-group field-tagihan-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="hidden" name="Deposit" value="0">
                                        <input type="checkbox" id="deposit" class="custom-control-input pilih-tagihan" name="deposit" value="0">
                                        <label class="custom-control-label" for="deposit">
                                            Gunakan deposit saya (<small class="align-top text-secondary">Rp</small>50.000)
                                        </label>
                                    </div>
                                </div>
                            </p>

                            <p class="mt-5">
                                <small>
                                    * Dengan menekan tombol <em>Bayar</em>,
                                    secara otomatis Anda menyetujui <a href="#">syarat dan ketentuan</a> yang berlaku
                                    serta mendapatkan Nomor Virtual Account [NAMA BANK] dengan masa aktif terbatas.
                                    Segera lakukan pembayaran dengan transfer ke Nomor Virtual Account yang Anda dapatkan.
                                </small>
                            </p>

                            <p class="mt-3">
                                <button type="button" class="btn btn-info" id="bayar">Bayar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#submit-tagihan').on('click', function (e) {
        $('#information-modal').modal('show');
        $('#information-modal').on('shown.bs.modal', function () {
            setTimeout(function () {
                $('#loading').attr('style', 'display: none;');
                $('#tagihan-terpilih').removeAttr('style', 'style');
            }, 1000);
        });
    });

    $('#bayar').on('click', function (e) {
        window.location.replace("virtual-account.html");
    });

    $('.card-tagihan').hover(
    function() { $(this).addClass('shadow'); },
    function() { $(this).removeClass('shadow'); }
    );

    $('.pilih-tagihan').on('change', function(e) {

        const checkbox = $(this);
        console.log(checkbox[0].labels);

        if (checkbox.is(':checked')) {
            checkbox.closest('.card').addClass('border-info');
        } else {
            checkbox.closest('.card').removeClass('border-info');
        }
    });
</script>
@endsection
