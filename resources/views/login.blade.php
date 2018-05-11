	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name') }}</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/svg-with-js/css/fa-svg-with-js.css') }}">
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<style type="text/css" media="screen">
			:root {
			  --input-padding-x: .75rem;
			  --input-padding-y: .75rem;
			}

			html, body {
			  height: 100%;
			}

			body {
			  display: -ms-flexbox;
			  display: -webkit-box;
			  display: flex;
			  -ms-flex-align: center;
			  -ms-flex-pack: center;
			  -webkit-box-align: center;
			  align-items: center;
			  -webkit-box-pack: center;
			  justify-content: center;
			  padding-top: 40px;
			  padding-bottom: 40px;
			  background-color: #f5f5f5;
			}

			.form-signin {
			  width: 100%;
			  max-width: 420px;
			  padding: 15px;
			  margin: 0 auto;
			}

			.form-label-group {
			  position: relative;
			  margin-bottom: 1rem;
			}

			.form-label-group > input,
			.form-label-group > label {
			  padding: var(--input-padding-y) var(--input-padding-x);
			}

			.form-label-group > label {
			  position: absolute;
			  top: 0;
			  left: 0;
			  display: block;
			  width: 100%;
			  margin-bottom: 0; /* Override default `<label>` margin */
			  line-height: 1.5;
			  color: #495057;
			  border: 1px solid transparent;
			  border-radius: .25rem;
			  transition: all .1s ease-in-out;
			}

			.form-label-group input::-webkit-input-placeholder {
			  color: transparent;
			}

			.form-label-group input:-ms-input-placeholder {
			  color: transparent;
			}

			.form-label-group input::-ms-input-placeholder {
			  color: transparent;
			}

			.form-label-group input::-moz-placeholder {
			  color: transparent;
			}

			.form-label-group input::placeholder {
			  color: transparent;
			}

			.form-label-group input:not(:placeholder-shown) {
			  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
			  padding-bottom: calc(var(--input-padding-y) / 3);
			}

			.form-label-group input:not(:placeholder-shown) ~ label {
			  padding-top: calc(var(--input-padding-y) / 3);
			  padding-bottom: calc(var(--input-padding-y) / 3);
			  font-size: 12px;
			  color: #777;
			}
		</style>
	</head>
	<body>
		{!! Form::open(['url' => route('post:login'), 'method' => 'POST', 'class' => 'form-signin']) !!}
			<div class="text-center">
				<div style="font-size:4em; color:#007bff">
				  <i class="fas fa-users"></i>
				</div>
				<h1 class="h3 mb-1 font-weight-normal" style="font-family: Helvatica, Century Gothic">Lite CRM</h1>
				<p>Client Relations Management</p>
			</div>

			<div class="form-label-group">
				<input type="text" name="username" id="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" placeholder="Username" autofocus>
				<label for="username">Username</label>
				@if($errors->has('username'))
					<div class="invalid-feedback">
			        	{{ $errors->first('username') }}
			        </div>
		        @endif
			</div>

			<div class="form-label-group">
				<input type="password" name="password" id="inputPassword" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password">
				<label for="inputPassword">Password</label>
				@if($errors->has('password'))
					<div class="invalid-feedback">
		          		{{ $errors->first('password') }}
			        </div>
		        @endif
			</div>

			<div class="checkbox mb-2">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div>

			<button class="btn btn-lg btn-outline-primary btn-block" type="submit">Sign in</button>
			<p class="mt-3 mb-3 text-muted text-center">&copy; Lite Technology 2018.</p>
	    </form>

		<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('fontawesome/svg-with-js/js/fontawesome-all.js') }}"></script>
		<script type="text/javascript">
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
		</script>
	</body>
	</html>