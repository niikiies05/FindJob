<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}">
	<link rel="apple-touch-icon-precomposed" href="{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}">
	<link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png') }}">
	<title>BOOTCLASIFIED - Responsive Classified Theme</title>
	<!-- Bootstrap core CSS -->
	<link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">


	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

	<!-- styles needed for carousel slider -->
	<link href="{{ asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/plugins/owl-carousel/owl.theme.css') }}" rel="stylesheet">

	<!-- bxSlider CSS file -->
	<link href="{{ asset('assets/plugins/bxslider/jquery.bxslider.css') }}" rel="stylesheet" />

	<!-- Just for debugging purposes. -->
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->

	<!-- include pace script for automatic web page progress bar  -->
	<script>
		paceOptions = {
			elements: true
		};
	</script>
	<script src="{{ asset('assets/js/pace.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/modernizr/modernizr-custom.js') }}"></script>

	<style>
		.hidden{
			display: none;
		}
	</style>
</head>
<body>

	<div id="wrapper">
        @include('partials.header')

		<!-- /.header -->

		<label class="theme-switcher theme-switcher-left-right">
			<span class="theme-switcher-label" data-on="{{ __('headerClient.dark_off') }}" data-off="{{ __('headerClient.dark') }}"></span>
			<span class="theme-switcher-handle"></span>
		</label>

		{{-- flas message --}}
		@include('flash::message')

		@yield('header')

        {{-- @include('partials.jobIntro') --}}
		<!-- /.intro -->

		<div class="main-container">
            @yield('content')
		</div>
		<!-- /.main-container -->
 
        @include('partials.footer')
		<!-- /.footer -->
	</div>
	<!-- /.wrapper -->


	<!-- Le javascript
================================================== -->

	<!-- Placed at the end of the document so the pages load faster -->

@include('partials.scriptTemplate')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
@yield('scripts')

<script src="{{ asset('js/like.js') }}"></script>
</body>

</html>