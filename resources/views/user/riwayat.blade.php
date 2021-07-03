@extends('user.layout.navbartemplate')
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/app/css/main.css">
    <link rel="stylesheet" href="{{asset('assets')}}/font-awesome/css/font-awesome.min.css">

    <script src="{{asset('assets')}}/jquery/dist/jquery.min.js"></script>
    <!-- <script src="https://kit.fontawesome.com/3b4957157c.js" crossorigin="anonymous"></script> -->

    <title>Riwayat Transaksi</title>
</head>

<body>


    <div class="wrap py-3" style="margin-top: 90px;">
        <div class="container-lg">

            <div class="row d-lg-flex justify-content-center">
                <div class="col-lg-12">

                    <h2>Riwayat Transaksi</h2>
                    <!-- <h3>[CARD STYLE]</h3> -->
                    <div id="tagihan-list">
                        @foreach ($data as $dt )
                        <div class="card card-tagihan shadow-sm my-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <strong class="text-blue-dark">{{$dt->nama_pembayaran}}</strong><br>
                                        <small>{{$dt->bulan}},{{$dt->created_at}}</small>
                                        <hr class="my-1 d-sm-block d-md-none">
                                    </div>
                                    <div class="col-6 col-md-2">
                                    </div>
                                    <div class="col-6 col-md-2">
                                    </div>
                                    <div class="col-6 col-md-2">
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <small class="text-nowrap text-secondary">Total</small>
                                        <p class="mb-0">{{$dt->jumlah_bayar}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/popperjs/dist/umd/popper.min.js"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        var message = '{{Session::get("alert")}}';
        var exist = '{{Session::has("alert")}}';
        if(exist){
            alert(message);
        }
    </script>
</body>

</html>
