<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">

		<title>Login | Dashboard</title>

		<meta name="author" content="@dannegm">
		<meta name="robots" content="noindex, nofollow">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
		
		<link rel="shortcut icon" href="{{URL::asset('/oneui/img/favicons/favicon.png')}}">

		<link rel="icon" type="image/png" href="{{URL::asset('/oneui/img/favicons/favicon-16x16.png')}}" sizes="16x16'">
		<link rel="icon" type="image/png" href="{{URL::asset('/oneui/img/favicons/favicon-32x32.png')}}" sizes="32x32'">
		<link rel="icon" type="image/png" href="{{URL::asset('/oneui/img/favicons/favicon-96x96.png')}}" sizes="96x96'">
		<link rel="icon" type="image/png" href="{{URL::asset('/oneui/img/favicons/favicon-160x160.png')}}" sizes="160x160">
		<link rel="icon" type="image/png" href="{{URL::asset('/oneui/img/favicons/favicon-192x192.png')}}" sizes="192x192">

		<link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-57x57.png')}}">
		<link rel="apple-touch-icon" sizes="60x60" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-60x60.png')}}">
		<link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-72x72.png')}}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-76x76.png')}}">
		<link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-114x114.png')}}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-120x120.png')}}">
		<link rel="apple-touch-icon" sizes="144x144" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-144x144.png')}}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-152x152.png')}}">
		<link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-180x180.png')}}">

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
		<link rel="stylesheet" href="{{URL::asset('/oneui/css/bootstrap.min.css')}}">
		<link rel="stylesheet" id="css-main" href="{{URL::asset('/oneui/css/oneui.min.css')}}">

	</head>
	<body class="bg-themed bg-primary-dark">
		<div class="content overflow-hidden">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
					<div class="block block-themed animated fadeIn">
						<div class="block-content block-content-full block-content-narrow">
							<h1 class="h2 font-w600 push-30-t push-5">Dashboard</h1>
							<p>Bienvenido, por favor inicia sesión.</p>

							@if($errors->any())
								<div class="input-field col s12">
									<p style="color:red">{{$errors->first()}}</p>
								</div>
							@endif

							{{Form::open(array('url' => 'appanel/dologin', 'id'=>'login'))}}
							<div class="js-validation-login form-horizontal push-30-t push-50" action="index.html" method="post">
								<div class="form-group">
									<div class="col-xs-12">
										<div class="form-material form-material-primary">
											<input class="form-control" type="text" name="username" value="{{Input::old('username')}}">
											<label for="login-username">Nombre de usuario</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12">
										<div class="form-material form-material-primary">
											<input class="form-control" type="password" name="password">
											<label for="login-password">Contraseña</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-sm-6 col-md-4">
										<button class="btn btn-block btn-primary" type="submit"> Entrar</button>
									</div>
								</div>
							</div>
							{{Form::close()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>