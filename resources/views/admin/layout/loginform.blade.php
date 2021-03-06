<!doctype html>
<html lang="en">

<head>
    <title>@yield('judul_aplikasi')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/loginadmin.css') }}">

</head>

<body>
    <section class="ftco-section" style="padding:0px; margin-left:30px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">@yield('keterangan') Admin</h3>
                        <form action="@yield('action')" class="login-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" placeholder="NIPD" name="nipd" autocomplete="off">
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" class="form-control rounded-left" placeholder="Password" name="password" autocomplete="off">
                            </div>
                            @yield('new_form')
                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-primary rounded submit px-3">@yield('keterangan')</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <p>Login <a href="/login">Siswa</a></p>
                                </div>
                                {{-- <div class="w-50 text-md-right">
                                    <a href="#">Lupa Password</a>
                                </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js') }}/jquery.min.js"></script>
    <script src="{{ asset('js') }}/popper.js"></script>
    <script src="{{ asset('js') }}/bootstrap.min.js"></script>
    <script src="{{ asset('js') }}/main.js"></script>

</body>

</html>
