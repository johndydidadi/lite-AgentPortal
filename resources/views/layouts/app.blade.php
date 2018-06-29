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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	@stack('css')
</head>
<body>
	<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Lite Technology</a>
		<ul class="navbar-nav px-3">
			{!! Form::open(['url' => route('post:logout'), 'method' => 'POST', 'class' => 'logout', 'id' => 'logout-form']) !!}
			{!! Form::close() !!}
			<li class="nav-item text-nowrap">
				<span class="pr-3 text-white" href="#">{{ Auth::user()->fullname }}</span>
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

			if($('.payment_type').val() == 'subscription'){
				$('.subscription').attr('disabled', false);
				$('#OTP').attr('disabled', true);
			}
			else if($('.payment_type').val() == 'one_time_payment'){
				$('#OTP').attr('disabled', false);
				$('.subscription').attr('disabled', true);
			}
			else{
				$('#OTP').attr('disabled', true);
				$('.subscription').attr('disabled', true);
			}

			if($('.role').val() == 'Admin'){
				$('.admin').attr('disabled', false);
				$('.price').attr('disabled', true);
			}
			else if($('.role').val() == 'Agent'){
				$('.price').attr('disabled', false);
				$('.admin').attr('disabled', true);
			}
			else{
				$('.price').attr('disabled', true);
				$('.admin').attr('disabled', true);
			}

		});

		$('.payment_type').change(function(){
			if($(this).val() == 'subscription'){
				$('.subscription').attr('disabled', false);
				$('#OTP').attr('disabled', true);
				$('#OTP').val('0.00');

			}
			else if($(this).val() == 'one_time_payment'){
				$('#OTP').attr('disabled', false);
				$('.subscription').attr('disabled', true);
				$('.subscription').val('0.00');
			}
		});

		$('.role').change(function(){
			if($(this).val() == 'Admin'){
				$('.admin').attr('disabled', false);
				$('.price').attr('disabled', true);
				$('.price').val('0.00');
			}
			else if($(this).val() == 'Agent'){
				$('.price').attr('disabled', false);
				$('.admin').attr('disabled', true);
				$('.admin').val('0.00');
			}
		});
		

	</script>
	</body>
</html>