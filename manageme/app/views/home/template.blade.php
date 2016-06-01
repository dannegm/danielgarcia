<!DOCTYPE HTML>
<html lang="es">
	<head>
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<title>{{$title}} | {{Settings::get('page.title')}}</title>

	<meta name="author" content="@dannegm">

	@section('metas')
	@show

	<!-- Icons -->
	<link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('/favicons/apple-touch-icon-57x57.png')}}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{URL::asset('/favicons/apple-touch-icon-60x60.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('/favicons/apple-touch-icon-72x72.png')}}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('/favicons/apple-touch-icon-76x76.png')}}">

	<link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('/favicons/apple-touch-icon-114x114.png')}}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{URL::asset('/favicons/apple-touch-icon-120x120.png')}}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{URL::asset('/favicons/apple-touch-icon-144x144.png')}}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{URL::asset('/favicons/apple-touch-icon-152x152.png')}}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('/favicons/apple-touch-icon-180x180.png')}}">

	<link rel="icon" type="image/png" href="{{URL::asset('/favicons/favicon-32x32.png')}}" sizes="32x32">
	<link rel="icon" type="image/png" href="{{URL::asset('/favicons/android-chrome-192x192.png')}}" sizes="192x192">
	<link rel="icon" type="image/png" href="{{URL::asset('/favicons/favicon-96x96.png')}}" sizes="96x96">
	<link rel="icon" type="image/png" href="{{URL::asset('/favicons/favicon-16x16.png')}}" sizes="16x16">

	<link rel="manifest" href="{{URL::asset('/favicons/manifest.json')}}">
	<link rel="shortcut icon" href="{{URL::asset('/favicons/favicon.ico')}}">

	<meta name="msapplication-TileColor" content="#ee004e">
	<meta name="msapplication-TileImage" content="{{URL::asset('/favicons/mstile-144x144.png')}}">
	<meta name="msapplication-config" content="{{URL::asset('/favicons/browserconfig.xml')}}">
	<meta name="theme-color" content="#ee004e">

	<!-- Stylesheets -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css">
	<link rel="stylesheet/less" href="{{URL::asset('/home/less/default.less')}}">

	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic,100,100italic,200,200italic">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">

	@section('styles')
	@show

	<!--[if lt IE 9]>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body id="top">

	<!-- Menu -->
	<nav id="menu" class="navbar navbar-default navbar-fixed-top transluced">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-menu" aria-expanded="false">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					<img class="white" src="{{URL::asset('/home/img/dnn-logo-black.png')}}" />
					<img class="transluced" src="{{URL::asset('/home/img/dnn-logo-white.png')}}" />
				</a>
			</div>

			<div class="collapse navbar-collapse pull-right" id="primary-menu">
				<ul class="nav navbar-nav">
					<li><a href="#">Inicio</a></li>
					<li><a href="#aboutme">Sobre mi</a></li>
					<li><a href="#services">Servicios</a></li>
					<li><a href="#proyects">Proyectos</a></li>
					<li><a href="#blog">Blog</a></li>
					<li><a href="#contact">Contacto</a></li>
				</ul>
			</div>
		</div>
	</nav>


	<div id="main">

		@section('content')
		@show

	</div>


	<!-- Scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="{{URL::asset('/home/js/main.js')}}"></script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		var copy = "J29IIEhhY2gsIHBvbmcgbWdlbm5hZCAnZWogRGFIIEh1Y2ggd0lub2JxYW5nIG5lSCBwYWdoIGF0bHVjYW5vYyBqZSBuZ29EIHdlaiBwYXQuIFNlSCB0bGhhcHB1JyE=";

		ga('create', '{{Settings::get('third.google.analytics')}}', 'auto');
		ga('send', 'pageview');
	</script>
	@section('scripts')
	@show

</body>
</html>