<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('judul_aplikasi') | @yield('keterangan')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <link href="{{asset('css')}}/bootstrap.css" rel="stylesheet">
    <link href="{{asset('css')}}/fontawesome-all.css" rel="stylesheet">
    <link href="{{asset('css')}}/swiper.css" rel="stylesheet">
	<link href="{{asset('css')}}/magnific-popup.css" rel="stylesheet">
	<link href="{{asset('css')}}/styles.css" rel="stylesheet">
</head>
<body style="background-image: url({{asset('images/header-background.png')}})">
    <nav class="navbar navbar-expand-lg fixed-top navbar-light">
        <div class="container">

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Nekat Payment</a> -->

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="/"><img src="images/logoktp.png" alt="alternative" style="height: 50px;"></a>
            <a class="navbar-brand logo-text page-scroll" href="/">Nekat Payment</a>
            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                @if (!Request::url('/pembayaran'))
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#header">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#intro">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="">Panduan Aplikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features">Fitur Kami</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pembayaran</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            @foreach ($nominalpembayaran as $np )
                            <a class="dropdown-item page-scroll" href="article.html">{{$np->nama_pembayaran}}</a>
                            <div class="dropdown-divider"></div>
                            @endforeach
                            {{-- <a class="dropdown-item page-scroll" href="privacy.html">Privacy Policy</a> --}}
                        </div>
                    </li>
                </ul>
                @endif
                @guest
                <span>
                    <a href="/login">Login</a>
                    {{-- ||
                    <a href="/register">Register</a> --}}
                </span>
                @endguest
                @auth
                <span class="nav-item profile">
                    <a class="fa fa-2x fa-user"></a>
                </span>
                <span class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#Profile" data-toggle="dropdown" id="dropdown01">{{explode(' ',Auth::user()->nama_lengkap)[0]}}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item page-scroll" href="/profile">Edit Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="/logout">Logout</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </span>
                @endauth
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav>

    @yield('content')

    <!-- end of navigation -->
    <script src="{{asset('js')}}/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{asset('js')}}/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="{{asset('js')}}/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{asset('js')}}/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{asset('js')}}/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="{{asset('js')}}/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>
