@extends('home/template')

@section('metas')
<meta property="og:type" content="website" />
<meta property="og:site_name" content="{{Settings::get('page.title')}}" />
<meta property="og:image" content="{{URL::asset('/home/img/logo.png')}}" />

<meta property="og:url" content="{{route('page.home')}}" />
<meta property="og:title" content="{{Settings::get('page.title')}}" />
@stop

@section('styles')
@stop

@section('scripts')
	<script src="{{URL::asset('/home/js/jquery.parallax.js')}}"></script>
	<script>
		$(function () {
			var $scene = $('#bg-paralax').parallax();
	        $scene.parallax('enable');
		});
	</script>
@stop

@section('content')
	<!-- Cover, Portada -->
	<section id="cover">
		<p id="scrolldown" data-appear="bounceInDown" data-appear-on="delay" data-appear-delay="2000">
			<span><i class="fa fa-angle-down fa-5x"></i></span>
		</p>
		<div class="bg-space">
			<ul id="bg-paralax">
				<li class="layer" data-depth="0.30"></li>
			</ul>
		</div>
		<div class="figure">
			<div class="wrapper">
				<figure data-appear="rollIn" data-appear-on="init">
					<img src="{{URL::asset('/home/img/dnn-avatar.png')}}" />
				</figure>
				<h1 data-appear="fadeInLeft" data-appear-on="init">
					<img src="{{URL::asset('/home/img/dnn-logo.png')}}" />
				</h1>
				<h2 data-appear="fadeInRight" data-appear-on="init">
					Hola!, Soy <em>desarrollador</em>, <em>diseñador</em>,
					<br /><em>programador</em> & <em>Especialista en Innovación</em>.
				</h2>
			</div>
		</div>
	</section>

	<!-- Acerca de mi -->
	<section id="aboutme" class="post">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-8 col-md-offset-2">
					<h1 class="text-center" data-appear="fadeIn">
						<span>Un poco sobre mi</span>
					</h1>
				</div>
				<div class="col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 text-center" data-appear="fadeInDown">
					<p>Soy un joven desarrollador de 23 años de edad con una trayectoria de 7 años de experiencia en el medio del desarrollo. Mi sed de conocimiento me ha llevado a explorar todo un mundo de desarrollo tecnológico enfocándome con mayor interés a la innovación tecnológica y el innevitable futuro.</p>
					<p>La mayor de mis virtudes es la curiosidad siendo esta la más influyente para aprender nuevas tendencias e impulsos tecnológicos. Innovar y crear un mundo mejor es el mayor de mis objetivos.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Servicios -->
	<section id="services" class="calltoaction purble">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-10 col-md-offset-1">
					<h1 data-appear="fadeInUp">Servicios</h1>
					<p data-appear="fadeInUp">¿Tienes duda sobre qué es lo que hago?</p>
				</div>
			</div>
		</div>
	</section>

	<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<!-- Html -->
					<div class="card" style="background-image: url('{{URL::asset('/home/img/bg/html.png')}}');">
						<div class="overlay">
							<div class="defaults">
								<figure class="ibadge fpurple mini" data-appear="rollIn">
									<i class="fa fa-globe"></i>
								</figure>
								<h1 data-appear="fadeInUp">Desarrollo Web</h1>
								<ul class="descriptions" data-appear="fadeInUp">
									<li>Dev/Design</li>
									<li>Front-end/Back-end</li>
									<li>Analytics/SEO</li>
									<li>Admin/Manage</li>
								</ul>
								<ul class="skills" data-appear="fadeInUp">
									<li>HTML5</li>
									<li>CSS5</li>
									<li>Javascript</li>
									<li>jQuery</li>
									<li>Bootstrap</li>
									<li>Angular</li>
									<li>Animation</li>
									<li>Responsive</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<!-- Mobile -->
					<div class="card" style="background-image: url('{{URL::asset('/home/img/bg/mobile.png')}}');">
						<div class="overlay">
							<div class="defaults">
								<figure class="ibadge fpurple mini" data-appear="rollIn">
									<i class="fa fa-mobile"></i>
								</figure>
								<h1 data-appear="fadeInUp">Desarrollo Móvil</h1>
								<ul class="descriptions" data-appear="fadeInUp">
									<li>UX Design</li>
									<li>Android/iOS</li>
									<li>Platforms API’s</li>
									<li>Publishing/Distributing</li>
									<li>Analytics</li>
								</ul>
								<ul class="skills" data-appear="fadeInUp">
									<li>Java</li>
									<li>Objetive-C</li>
									<li>Swift</li>
									<li>REST</li>
									<li>SQLite</li>
									<li>Xcode</li>
									<li>Android Studio</li>
								</ul>	
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<!-- Interactive -->
					<div class="card" style="background-image: url('{{URL::asset('/home/img/bg/interactive.png')}}');">
						<div class="overlay">
							<div class="defaults">
								<figure class="ibadge fpurple mini" data-appear="rollIn">
									<i class="fa fa-eye"></i>
								</figure>
								<h1 data-appear="fadeInUp">Desarrollo Interactivo</h1>
								<ul class="descriptions" data-appear="fadeInUp">
									<li>Game Desing</li>
									<li>Augmented Reality</li>
									<li>Virtual Reality</li>
									<li>Analytics</li>
								</ul>
								<ul class="skills" data-appear="fadeInUp">
									<li>Unity3D</li>
									<li>LeapMotion</li>
									<li>Kinect</li>
									<li>CardBoard</li>
									<li>Vuforia</li>
									<li>Arduino</li>
									<li>Oculus Rift</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<!-- Platform -->
					<div class="card" style="background-image: url('{{URL::asset('/home/img/bg/platforms.png')}}');">
						<div class="overlay">
							<div class="defaults">
								<figure class="ibadge fpurple mini" data-appear="rollIn">
									<i class="fa fa-cog"></i>
								</figure>
								<h1 data-appear="fadeInUp">Plataformas</h1>

								<ul class="descriptions" data-appear="fadeInUp">
									<li>Backend Develoment</li>
									<li>REST Full API</li>
									<li>Websockets</li>
									<li>Data Bases/Big Data</li>
									<li>Sysadmin/Security</li>
								</ul>
								<ul class="skills" data-appear="fadeInUp">
									<li>PHP</li>
									<li>NodeJS</li>
									<li>Python</li>
									<li>Java</li>
									<li>MySQL</li>
									<li>MongoDB</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>

	<!-- Proyectos -->
	<section id="proyects" class="calltoaction blue">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-10 col-md-offset-1">
					<h1 data-appear="fadeInUp">Proyectos</h1>
					<p data-appear="fadeInUp">¿Te gustaría ver las cosas sorprendentes que he hecho?</p>
				</div>
			</div>
		</div>
	</section>

	<section class="post">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-8 col-md-offset-2">
					<h1 class="text-center" data-appear="fadeIn">
						<span>Proyectos</span>
					</h1>
				</div>
				<div class="col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 text-center" data-appear="fadeInDown">
					<p>Aquí aparecerán los proyectos que he heco, aún no sé muy bien cómo podría mostrarlos.</p>
				</div>
			</div>
		</div>
	</section>

@stop
