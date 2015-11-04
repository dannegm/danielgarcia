<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">

	<title>{{$title}} | {{Settings::get('page.title')}}</title>

	<meta name="author" content="@dannegm">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

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

	<link rel="stylesheet" href="{{URL::asset('/home/assets/css/main.css')}}" />
	<link rel="stylesheet" href="{{URL::asset('/home/css/font-awesome.min.css')}}">
	@section('styles')
	@show

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="{{URL::asset('/home/assets/css/ie8.css')}}" />
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body id="top">


	<header id="header">
		{{Fragment::get('general.header')->html}}
	</header>

	<div id="main">

		@section('content')
		@show

	</div>

	<footer id="footer">
		<ul class="icons">
			<li><a href="{{Settings::get('social.twitter')}}" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
			<li><a href="{{Settings::get('social.instagram')}}" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
			<li><a href="{{Settings::get('social.github')}}" class="icon fa-github"><span class="label">Github</span></a></li>
			<li><a href="{{Settings::get('social.linkedin')}}" class="icon fa-linkedin"><span class="label">Linked In</span></a></li>
		</ul>
		<ul class="copyright">
			<li>By Dannegm</li>
			<li>&copy; 2015</li>
		</ul>
	</footer>


	<!-- Scripts -->
	<script src="{{URL::asset('/home/assets/js/jquery.min.js')}}"></script>
	<script src="{{URL::asset('/home/assets/js/jquery.poptrox.min.js')}}"></script>
	<script src="{{URL::asset('/home/assets/js/skel.min.js')}}"></script>
	<script src="{{URL::asset('/home/assets/js/util.js')}}"></script>
	<script src="{{URL::asset('/home/assets/js/main.js')}}"></script>
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