<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name') }}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/svg-with-js/css/fa-svg-with-js.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/layouts.app.css') }}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
	@stack('css')
</head>
<body>
	<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Lite Technology</a>
		<ul class="navbar-nav px-3">
			{!! Form::open(['url' => route('post:logout'), 'method' => 'POST', 'class' => 'logout', 'id' => 'logout-form']) !!}
			{!! Form::close() !!}
			<li class="nav-item text-nowrap">
				<span class="pr-3 text-white" href="#">{{ Auth::user()->firstname }}</span>
				<a class="btn btn-outline-light btn-sm  logout" href="#">Sign out</a>
			</li>
		</ul>
	</nav>

	<div class="container-fluid">
		<div class="row">
			@include('partials.side-nav')

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
					@yield('header')
				</div>
				@yield('content')
			</main>
		</div>
	</div>

	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
	<script type="text/javascript" src="{{ asset('fontawesome/svg-with-js/js/fontawesome-all.js') }}"></script>
	<script type="text/javascript" src="{{ asset('priceFormat/jquery.priceformat.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
	@stack('js')

	<script type="text/javascript">
		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$('.price').priceFormat({
				prefix: '',
				thousandsSeparator: ','
			});

			$('.datepicker').datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true,
				orientation: "bottom auto"
			});
		});
	</script>
	</body>
</html>