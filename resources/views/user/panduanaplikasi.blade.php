@extends('user.layout.navbartemplate')
@section('judul_aplikasi','Nekat Payment')
@section('keterangan','Panduan Aplikasi')
@section('content')
<style>
    .container-panduan{
        margin: 150px 120px;
    }
    .sub-ul{
        list-style: none;
    }
</style>
<body background="{{ asset('images/header-background.png') }}">
    <div class="container-panduan">
        <div id="text">
            <h3>1. Pembayaran</h3>
            <ul class="sub-ul">
                <li>1.Login terlebih dahulu menggunakan akun yang telah tersedia </li>
                <li>2.Klik 'Pembayaran' pada navigasi bar dekat icon profile </li>
                <li>3.Pilih pembayaran apa yang akan anda bayar, jika sudah klik 'Pilih Pembayaran' </li>
                <li>4.Setelah itu klik 'Bayar' </li>
                <li>5.Pilih metode pembayaran </li>
                <ul>
                    <li>
                        <strong>Gopay</strong>
                        <ol>
                            <li>Dihalaman metode pembayaran klik 'Gopay/E-Wallet'</li>
                            <li>Klik 'Bayar Sekarang'</li>
                            <li>Buka aplikasi Gojek</li>
                            <li>Klik 'Bayar'</li>
                            <li>Scan QR Code</li>
                            <li>Setelah Scan Qr Code,Klik 'Saya sudah Bayar'</li>
                            <li>Selesai</li>
                        </ol>
                    </li>
                    <li>
                        <strong>ShopeePay</strong>
                        <ol>
                            <li>Dihalaman metode pembayaran klik 'ShopeePay/E-Wallet'</li>
                            <li>Klik 'Bayar Sekarang'</li>
                            <li>Buka aplikasi Shopee</li>
                            <li>Klik 'Scan'</li>
                            <li>Scan QR Code</li>
                            <li>Setelah Scan Qr Code,Klik 'Saya sudah Bayar'</li>
                            <li>Selesai</li>
                        </ol>
                    </li>
                    <li>
                        <strong>Kartu Kredit/Debit</strong>
                        <ol>
                            <li>Dihalaman metode pembayaran klik 'Kartu Kredit/Debit'</li>
                            <li>Masukan Email,No Telepon,Nomor Kartu,Waktu Expired,CVV</li>
                            <li>Klik 'Bayar Sekarang'</li>
                            <li>Masukan Password Kartu</li>
                            <li>Selesai</li>
                        </ol>
                    </li>
                </ul>
                <li>6.Selesai </li>
            </ul>
            <p>Note: Jika anda ingin mereset pembayaran yang telah anda pilih, klik 'Reset' di pojok kanan atas kotak pilih
                pembayaran</p>
            <h3>2. Edit Profil</h3>
            <ul class="sub-ul">
                <li>1.Login terlebih dahulu menggunakan akun yang telah tersedia </li>
                <li>2.Arahkan kursor ke nama anda yang tertera di pojok kanan atas </li>
                <li>3.Klik 'Edit Profile' </li>
                <li>4.Jika sudah selesai klik 'Perbarui' </li>
            </ul>
            <h3>3. Logout</h3>
            <ul class="sub-ul">
                <li>1.Pastikan anda sudah login </li>
                <li>2.Arahkan kursor ke nama anda yang tertera di pojok kanan atas </li>
                <li>3.Klik 'Logout' </li>
            </ul>
        </div>
        <div id="sidebar">
            <h3 >Note :</h3>
            <p>Jika anda masih bingung tentang panduan aplikasi ini, anda bisa chat kami dibagian chat pelayanan.Klik bubble icon pada pojok kanan bawah.</p>
        </div>
    </div>
</body>
@endsection
