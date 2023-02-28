<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>@yield('title')</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
		{{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> --}}
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/progressbar_barfiller.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/gijgo.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/animated-headline.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/fontawesome-v5/css/all.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
        @yield('topRes')
	</head>
	<body class="full-wrapper">
		<div id="preloader-active">
			<div class="preloader d-flex align-items-center justify-content-center">
				<div class="preloader-inner position-relative">
					<div class="preloader-circle"></div>
					<div class="preloader-img pere-text">
						<img src="{{ asset('assets/img/logo/loder.png') }}" alt="">
					</div>
				</div>
			</div>
		</div>

		@include('user.layouts.topMenu')

		<main>
            @yield('content')

			<x-user.category/>
		</main>
		
        @include('user.layouts.footer')
        
		<script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
		<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
		<script src="{{ asset('assets/js/popper.min.js') }}"></script>
		{{-- <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> --}}
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('assets/js/slick.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
		<script src="{{ asset('assets/js/wow.min.js') }}"></script>
		<script src="{{ asset('assets/js/animated.headline.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
		<script src="{{ asset('assets/js/gijgo.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.barfiller.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
		<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
		<script src="{{ asset('assets/js/hover-direction-snake.min.js') }}"></script>
		<script src="{{ asset('assets/js/contact.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.form.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('assets/js/mail-script.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
		<script src="{{ asset('assets/js/plugins.js') }}"></script>
		<script src="{{ asset('assets/js/main.js') }}"></script>
	</body>
</html>