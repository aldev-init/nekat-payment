{{-- section comment
    judul_aplikasi
    keterangan
    new_form
    --}}

<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('judul_aplikasi')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('images/logoktp.png')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/main.css">
<!--===============================================================================================-->
    {{-- bootstrap link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt style="margin-left:30px;margin-top:-80px;">
					<a href="/"><img src="{{asset('images/logoktp.png')}}" alt="IMG"></a>
				</div>

				<form class="login100-form validate-form" action="@yield('action')" method="POST" style="margin-top: -100px;">
                    @csrf
					<span class="login100-form-title">
						@yield('keterangan')
					</span>
                    @yield('content')

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							@yield('button')
						</button>
					</div>


					{{-- <div class="text-center p-t-136">
						<a class="txt2" href="@yield('link')">
							@yield('hyperlink-button')
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> --}}
				</form>
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
	<script src="{{asset('vendor')}}/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
