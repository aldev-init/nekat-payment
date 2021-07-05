<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Nekat Payment</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <link href="{{asset('css')}}/bootstrap.css" rel="stylesheet">
    <link href="{{asset('css')}}/fontawesome-all.css" rel="stylesheet">
    <link href="{{asset('css')}}/swiper.css" rel="stylesheet">
	<link href="{{asset('css')}}/magnific-popup.css" rel="stylesheet">
	<link href="{{asset('css')}}/styles.css" rel="stylesheet">

	<!-- Favicon  -->
    <link rel="icon" href="{{asset('images/logoktp.png')}}">
</head>
<body data-spy="scroll" data-target=".fixed-top">

    <!-- Navigation -->
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
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#header">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#intro">Tentang Aplikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/panduanaplikasi">Panduan Aplikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features">Fitur Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#aboutus">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/news">News</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/pembayaran">Pembayaran</a>
                        {{-- <div class="dropdown-menu" aria-labelledby="dropdown01"> --}}
                            {{-- <a class="dropdown-item page-scroll" href="privacy.html">Privacy Policy</a> --}}
                        {{-- </div> --}}
                    </li>
                </ul>
                @guest
                <span>
                    <a href="/login">Login</a>
                    {{-- ||
                    <a href="/register">Register</a> --}}
                </span>
                @endguest
                @auth
                <span class="nav-item">
                    <a class="fa fa-2x fa-user"></a>
                </span>
                <span class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#Profile" data-toggle="dropdown" id="dropdown01">{{explode(' ',Auth::user()->nama_lengkap)[0]}}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item page-scroll" href="/profile">Edit Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="/riwayat">Riwayat Transaksi</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="/logout">Logout</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </span>
                @endauth
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="text-container">
                        <h1 class="h3-large">Selamat Datang Di Website Nekat Payment SMKN 1 Katapang </h1>
                        <p class="p-large">Serahkan segala urusan administrasi pembayaran anda kepada kami. Kami siap melayani anda</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-7">
                    <div class="image-container">
                        <img class="img-fluid" src="{{asset('images/bg.png')}}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Customers -->
    <div class="slider-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Mendukung Pembayaran Dengan</h4>
                    <hr class="section-divider">

                    <!-- Image Slider -->
                    <div class="slider-container">
                        <div class="swiper-container image-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="{{asset('images/logo/shopeepay-logo.png')}}" alt="alternative" style="width: 200px; height:60px; margin-top:5px;">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="{{asset('images/logo/kartukredit-removebg-preview.png')}}" alt="alternative" style="margin-top:20px;">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="{{asset('images/logo/gopay.png')}}" alt="alternative" style="margin-top:10px;">
                                </div>
                                {{-- <div class="swiper-slide">
                                    <img class="img-fluid" src="{{asset('images/logo/cutter/Dana.png')}}" alt="alternative" style="margin-top:10px;">
                                </div> --}}
                                {{-- <div class="swiper-slide">
                                    <img class="img-fluid" src="{{asset('images/logo/bank-transfer-logo.png')}}" alt="alternative">
                                </div> --}}
                                {{-- </div>
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="images/customer-logo-5.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="images/customer-logo-6.png" alt="alternative">
                                </div> --}}
                            </div> <!-- end of swiper-wrapper -->
                        </div> <!-- end of swiper container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of image slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-1 -->
    <!-- end of customers -->


    <!-- Introduction -->
    <div id="intro" class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <img class="img-fluid" src="{{asset('images/gambartentang.png')}}" alt="alternative">
                </div> <!-- end of col -->
                <div class="col-lg-5">
                    <div class="text-container">
                        <h2>Kenalan Sama Nekat Payment Yuk!</h2>
                        <p>Nekat Payment merupakan platform pembayaran biaya sekolah berbasis online.</p>
                        <p>Tidak perlu ribet lagi untuk mengurus Pembayaran Ke Sekolah. Dengan Nekat Payment semua bisa selesai dengan cepat dan mudah</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of introduction -->


    <!-- Features -->
    <div id="features" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Cek Fitur Kami</h2>
                    <p class="p-heading">Fitur ini dibuat agar pengguna nyaman menggunakan aplikasi ini</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-icon-wrapper">
                            <div class="card-icon">
                                <span class="fas fa-smile green"></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Chat Pelayanan</h4>
                            <p>Jika anda bingung tentang aplikasi ini,anda bisa meminta bantuan kepada chat pelayanan yang berada dipojok kanan bawah.</p>
                            {{-- <a class="read-more no-line" href="article.html">Learn more <span class="fas fa-long-arrow-alt-right"></span></a> --}}
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-icon-wrapper">
                            <div class="card-icon">
                                <span class="far fa-envelope blue"></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Email Notifikasi</h4>
                            <p>Dapatkan email notifikasi,untuk konfirmasi pembayaran.</p>
                            {{-- <a class="read-more no-line" href="article.html">Learn more <span class="fas fa-long-arrow-alt-right"></span></a> --}}
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-icon-wrapper">
                            <div class="card-icon">
                                <span class="fas fa-history purple"></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Riwayat Transaksi</h4>
                            <p>Anda dapat melihat transaksi terakhir yang anda lakukan dimenu riwayat transaksi.</p>
                            {{-- <a class="read-more no-line" href="article.html">Learn more <span class="fas fa-long-arrow-alt-right"></span></a> --}}
                        </div>
                    </div>
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of features -->


    <!-- Testimonials -->
    <div class="slider-2" id="aboutus">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">About US</h2>
                    {{-- <p class="p-heading">You can read below a few testimonials from satisfied shop owners. Of course there are also some unhappy ones but they're not here</p> --}}
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="testimonial-text">Saya Bertugas Untuk Mendesain Tampilan Website Sebelum Di Implementasikan Ke Halaman Website </p>
                                            <div class="details">
                                                <img class="testimonial-image" src="{{asset('images/about us/ajeng.jpeg')}}" alt="alternative">
                                                <div class="text">
                                                    <div class="testimonial-author">Ajeng Nurfadillah</div>
                                                    <div class="occupation">UI Designer</div>
                                                </div> <!-- end of text -->
                                            </div> <!-- end of testimonial-details -->
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="testimonial-text">Saya Bertugas Untuk Mendesain Tampilan Website Sebelum Di Implementasikan Ke Halaman Website</p>
                                            <div class="details">
                                                <img class="testimonial-image" src="{{asset('images/about us/nadiahertisa.jpg')}}" alt="alternative">
                                                <div class="text">
                                                    <div class="testimonial-author">Nadia Hertisa</div>
                                                    <div class="occupation">UI Designer</div>
                                                </div> <!-- end of text -->
                                            </div> <!-- end of testimonial-details -->
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="testimonial-text">Saya Bertugas Mengimplementasikan Desain Website Ke Halaman Website </p>
                                            <div class="details">
                                                <img class="testimonial-image" src="{{asset('images/about us/gita.png')}}" alt="alternative">
                                                <div class="text">
                                                    <div class="testimonial-author">Arianti Apriani Sagita</div>
                                                    <div class="occupation">Frontend Developer</div>
                                                </div> <!-- end of text -->
                                            </div> <!-- end of testimonial-details -->
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="testimonial-text">Saya Bertugas Mengimplementasikan Desain Website Ke Halaman Website</p>
                                            <div class="details">
                                                <img class="testimonial-image" src="{{asset('images/about us/tiara.png')}}" alt="alternative">
                                                <div class="text">
                                                    <div class="testimonial-author">Tiara Situmorang</div>
                                                    <div class="occupation">Frontend Developer</div>
                                                </div> <!-- end of text -->
                                            </div> <!-- end of testimonial-details -->
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="testimonial-text">Saya Bertugas Membuat Sistem Dan Fitur Untuk Website</p>
                                            <div class="details">
                                                <img class="testimonial-image" src="{{asset('images/about us/al-picture.png')}}" alt="alternative">
                                                <div class="text">
                                                    <div class="testimonial-author">Muhammad Alghifari</div>
                                                    <div class="occupation">Backend Developer</div>
                                                </div> <!-- end of text -->
                                            </div> <!-- end of testimonial-details -->
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                {{-- <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="testimonial-text">Totally recommended. I am happy to have chosen Blink for our shop implementation. Their great specialized experience helped the project and made it available 2 weeks prior the launch</p>
                                            <div class="details">
                                                <img class="testimonial-image" src="images/testimonial-6.jpg" alt="alternative">
                                                <div class="text">
                                                    <div class="testimonial-author">Vanya Dropper</div>
                                                    <div class="occupation">Marketer - Flinco</div>
                                                </div> <!-- end of text -->
                                            </div> <!-- end of testimonial-details -->
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide --> --}}

                            </div> <!-- end of swiper-wrapper -->

                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->

                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of card slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-2 -->
    <!-- end of testimonials -->


    <!-- Newsletter -->
	{{-- <div class="form-1">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Subscribe And Follow Us</h2>
                    <p class="p-heading">Be part of the story and follow us on Twitter via <a href="#your-link">@name</a> and subscribe to the newsletter for news and updates about our workshops</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12"> --}}

                    <!-- Newsletter Form -->
                    {{-- <form>
                        <div class="form-group mail">
                            <input type="email" class="form-control-input" id="nemail" required>
                            <label class="label-control" for="nemail">Email address</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">Subscribe</button>
                        </div>
                        <div class="form-message">
                            <div id="nmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                    </form> --}}
                    <!-- end of newsletter form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of newsletter -->


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-col first">
                        <h6>Tentang Sekolah</h6>
                        <p class="p-small">SMKN 1 Katapang Adalah Sekolah Menengah Kejuruan Negeri diLingkungan Dinas Pendidikan Provinsi Jawa Barat.  Berdiri pada Tahun 1999 </p>
                    </div> <!-- end of footer-col -->
                    <div class="footer-col second">
                        <h6>Alamat</h6>
                        <ul class="list-unstyled li-space-lg p-small">
                            <li>Jalan Ceuri Jalan Terusan Kopo No.KM 13.5, Katapang, Kec. Katapang, Bandung, Jawa Barat 40971</li>
                        </ul>
                    </div> <!-- end of footer-col -->
                    <div class="footer-col third">
                        {{-- <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-pinterest-p fa-stack-1x"></i>
                            </a>
                        </span> --}}
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <p class="p-small">Kami Akan Senang Menerima Kritik Dan Saran Anda <a href="mailto:smkn1_ktp@icloud.com">Email:<strong>smkn1_ktp@icloud.com</strong></a></p>
                    </div> <!-- end of footer-col -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->
    <!-- end of footer -->


    <!-- Copyright -->
    {{-- <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © <a href="#your-link">Your name</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> --}}
    <!-- end of copyright -->


    <!-- Scripts -->
    <script src="{{asset('js')}}/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{asset('js')}}/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="{{asset('js')}}/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{asset('js')}}/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{asset('js')}}/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="{{asset('js')}}/scripts.js"></script> <!-- Custom scripts -->
    <script>
        var message = '{{Session::get("login")}}';
        var exist = '{{Session::has("login")}}';
        if(exist){
            alert(message);
        }
    </script>
     <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="45c553c6-a182-49f4-b3fd-66f8ab169244";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</body>
</html>

