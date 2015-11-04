<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<title>{{$title}} | Dashboard</title>

	<meta name="author" content="@dannegm">
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

	<!-- Icons -->
	<link rel="shortcut icon" href="{{URL::asset('/oneui/img/favicons/favicon.png')}}">

	<link rel="icon" type="image/png" href="{{URL::asset('/oneui/img/favicons/favicon-16x16.png')}}" sizes="16x16">
	<link rel="icon" type="image/png" href="{{URL::asset('/oneui/img/favicons/favicon-32x32.png')}}" sizes="32x32">
	<link rel="icon" type="image/png" href="{{URL::asset('/oneui/img/favicons/favicon-96x96.png')}}" sizes="96x96">
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

	@section('styles-oneui')
	@show

	<!-- Stylesheets -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
	<link rel="stylesheet" href="{{URL::asset('/oneui/css/bootstrap.min.css')}}">
	<link rel="stylesheet" id="css-main" href="{{URL::asset('/oneui/css/oneui.min.css')}}">
	@section('styles')
	@show

</head>
<body>
	<div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
		<!-- Sidebar -->
		<nav id="sidebar">
			<div id="sidebar-scroll">
				<div class="sidebar-content">
					<!-- Side Header -->
					<div class="side-header side-content bg-white-op">
						<a class="h5 text-white" href="{{route('appanel')}}">
						<i class="fa fa-circle-o-notch text-primary"></i>
						<span class="h4 font-w600 sidebar-mini-hide">&nbsp;&nbsp;&nbsp;manageme</span>
						</a>
					</div>

					<!-- Side Content -->
					<div class="side-content">
						<ul class="nav-main">
							<li>
								<a{{$section=='index'?' class="active"':''}} href="{{route('appanel')}}">
									<i class="si si-home"></i>
									<span class="sidebar-mini-hide">Inicio</span>
								</a>
							</li>

							<li class="nav-main-heading"><span class="sidebar-mini-hide">Contenidos</span></li>
							<li>
								<a{{$section=='pages'?' class="active"':''}} href="{{route('appanel.pages.index')}}">
									<i class="si si-doc"></i>
									<span class="sidebar-mini-hide">Páginas</span>
								</a>
							</li>
							<li>
								<a{{$section=='notes'?' class="active"':''}} href="{{route('appanel.notes.index')}}">
									<i class="si si-notebook"></i>
									<span class="sidebar-mini-hide">Notas</span>
								</a>
							</li>
							<li>
								<a{{$section=='categories'?' class="active"':''}} href="{{route('appanel.categories.index')}}">
									<i class="si si-grid"></i>
									<span class="sidebar-mini-hide">Categorias</span>
								</a>
							</li>
							<li>
								<a{{$section=='fragments'?' class="active"':''}} href="{{route('appanel.fragments.index')}}">
									<i class="si si-puzzle"></i>
									<span class="sidebar-mini-hide">Fragmentos</span>
								</a>
							</li>

							<li class="nav-main-heading"><span class="sidebar-mini-hide">Multimedia</span></li>
							<li>
								<a{{$section=='pictures'?' class="active"':''}} href="{{route('appanel.picture.index')}}">
									<i class="si si-picture"></i>
									<span class="sidebar-mini-hide">Imágenes</span>
								</a>
							</li>

							<li class="nav-main-heading"><span class="sidebar-mini-hide">Administración</span></li>
							<li>
								<a{{$section=='users'?' class="active"':''}} href="{{route('appanel.user.index')}}">
									<i class="si si-users"></i>
									<span class="sidebar-mini-hide">Usuarios</span>
								</a>
							</li>
							<li>
								<a{{$section=='settings'?' class="active"':''}} href="{{route('appanel.settings.index')}}">
									<i class="si si-wrench"></i>
									<span class="sidebar-mini-hide">Configuración</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>

		<!-- Header -->
		<header id="header-navbar" class="content-mini content-mini-full">
			<!-- Header Navigation Right -->
			<ul class="nav-header pull-right">
				@if(Auth::check())
				<li>
                    <div class="btn-group">
                        <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                            <img src="{{URL::asset('/pictures/sqm/' . Auth::user()->picture->url)}}" alt="Avatar">
                            <span> {{Auth::user()->name}} </span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a tabindex="-1" href="{{route('appanel')}}/user/{{Auth::user()->uid}}/edit">
                                    <i class="si si-user pull-right"></i>Perfil
                                </a>
                            </li>
                            <li>
                                <a tabindex="-1" href="{{route('appanel')}}/user/{{Auth::user()->uid}}/edit">
                                    <i class="si si-settings pull-right"></i>Configuración
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="{{route('logout')}}">
                                    <i class="si si-logout pull-right"></i>Salir
                                </a>
                            </li>
                        </ul>
                    </div>
				</li>
				@endif
			</ul>

			<!-- Header Navigation Left -->
			<ul class="nav-header pull-left">
				<li class="hidden-md hidden-lg">
					<button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
						<i class="fa fa-navicon"></i>
					</button>
				</li>
				<li class="visible-xs">
					<button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
						<i class="fa fa-search"></i>
					</button>
				</li>
				<li class="js-header-search header-search">
					<form class="form-horizontal" action="start_backend.html" method="post">
						<div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
							<input class="form-control" type="text" id="base-material-text" name="base-material-text" placeholder="Buscar...">
							<span class="input-group-addon"><i class="si si-magnifier"></i></span>
						</div>
					</form>
				</li>
			</ul>
		</header>

		<!-- Main Container -->
		<main id="main-container">
			<!-- Page Header -->
			<div class="content bg-gray-lighter">
				<div class="row items-push">
					<div class="col-sm-7">
						<h1 class="page-heading">
							{{$title}}
						</h1>
					</div>
					<div class="col-sm-5 text-right hidden-xs">
						<ol class="breadcrumb push-10-t">
						@section('breadcrumb')
						@show
						</ol>
					</div>
				</div>
			</div>

			<!-- Page Content -->
			
			@section('content')
			@show

		</main>
		<!-- END Main Container -->

		<!-- Footer -->
		<footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
			<div class="pull-left">
			</div>
		</footer>
	</div>

	@section('modals')
	@show

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="{{URL::asset('/oneui/js/oneui.min.js')}}"></script>
	@section('scripts')
	@show
</body>
</html>