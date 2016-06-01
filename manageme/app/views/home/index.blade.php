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
					<h1 class="text-center" data-appear="fadeIn">Un poco sobre mi</h1>
				</div>
				<div class="col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 text-center" data-appear="fadeInDown">
					<p>Soy un joven desarrollador de 23 años de edad con una trayectoria de 7 años de experiencia en el medio del desarrollo. Mi sed de conocimiento me ha llevado a explorar todo un mundo de desarrollo tecnológico enfocándome con mayor interés a la innovación tecnológica y el innevitable futuro.</p>
					<p>La mayor de mis virtudes es la curiosidad siendo esta la más influyente para aprender nuevas tendencias e impulsos tecnológicos. Innovar y crear un mundo mejor es el mayor de mis objetivos.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Servicios -->
	<section class="calltoaction purble">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-10 col-md-offset-1">
					<h1 data-appear="fadeInUp">Servicios</h1>
					<p data-appear="fadeInUp">¿Tienes duda sobre qué es lo que hago?</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-md-3 text-center">
					<div class="card">
						<figure class="ibadge fpurple">
							<i class="fa fa-globe"></i>
						</figure>
						<h1 data-appear="fadeInUp">Soluciones Web</h1>
						<p data-appear="fadeInUp">...</p>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 text-center">
					<div class="card">
						<figure class="ibadge fpurple">
							<i class="fa fa-mobile"></i>
						</figure>
						<h1 data-appear="fadeInUp">Desarrollo Móvil</h1>
						<p data-appear="fadeInUp">...</p>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 text-center">
					<div class="card">
						<figure class="ibadge fpurple">
							<i class="fa fa-eye"></i>
						</figure>
						<h1 data-appear="fadeInUp">Interactivos</h1>
						<p data-appear="fadeInUp">...</p>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 text-center">
					<div class="card">
						<figure class="ibadge fpurple">
							<i class="fa fa-cog"></i>
						</figure>
						<h1 data-appear="fadeInUp">Plataformas</h1>
						<p data-appear="fadeInUp">...</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Html -->
	<div class="parallax" style="background-image: url('{{URL::asset('/home/img/bg/html.jpg')}}');">
		<div class="overlay">
			<div class="container">
				<div class="row">
					<div class="col-md-3 defaults">
						<figure class="ibadge fpurple mini">
							<i class="fa fa-globe"></i>
						</figure>
						<h1 data-appear="bounceInLeft">Desarrollo Web</h1>
					</div>
					<div class="col-md-9 defaults">
						<div class="row">
							<div class="col-md-6">
								<p data-appear="bounceInLeft">El desarrollo web es una de mis pasiones; desde mi punto de vista, es otra forma más de hacer arte. Son 7 años los que me respaldan en el medio y clientes tan icónicos en mi portafolio desde <a href="http://derbez.ambmultimedia.mx">Eugenio Derbez</a> hasta la editorial <em>Santillana</em>.</p>
							</div>
							<div class="col-md-6" data-appear="bounceInRight">
								<h2>Algunos Skilss</h2>
								<ul class="descriptions">
									<li>Dev/Design</li>
									<li>Front-end/Back-end</li>
									<li>Analytics/SEO</li>
									<li>Admin/Manage</li>
								</ul>
								<ul class="skills">
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
			</div>
		</div>
	</div>

	<!-- Mobile -->
	<div class="parallax" style="background-image: url('{{URL::asset('/home/img/bg/mobile.jpg')}}');">
		<div class="overlay">
			<div class="container">
				<div class="row">
					<div class="col-md-3 defaults">
						<figure class="ibadge fpurple mini">
							<i class="fa fa-mobile"></i>
						</figure>
						<h1 data-appear="bounceInLeft">Desarrollo Móvil</h1>
					</div>
					<div class="col-md-9 defaults">
						<div class="row">
							<div class="col-md-6">
								<p data-appear="bounceInLeft">Las aplicaciones móviles están cada vez más presente en el día y a día gracias a la utilidad que en ellas hemos encontrado. El mundo sigue avanzando y como es de esperarse, uno debe aprender este tipo de técnicas para tener un mayor alcance a los clientes o usuarios que disfrutan de nuestros servicios.</p>
								<p data-appear="bounceInLeft">Cuento con 4 años de experiencia en el desarrollo de aplicaciones móviles nativas e híbirdas con clientes en mi protafolio como <em>El Consejo de la Comunicación</em> hasta <em>La Secretaría de Gobernación</em>.</p>
							</div>
							<div class="col-md-6" data-appear="bounceInRight">
								<h2>Algunos Skilss</h2>
								<ul class="descriptions">
									<li>UX Design</li>
									<li>Android/iOS</li>
									<li>Platforms API’s</li>
									<li>Publishing/Distributing</li>
									<li>Analytics</li>
								</ul>
								<ul class="skills">
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
			</div>
		</div>
	</div>

	<!-- Interactive -->
	<div class="parallax" style="background-image: url('{{URL::asset('/home/img/bg/interactive.png')}}');">
		<div class="overlay">
			<div class="container">
				<div class="row">
					<div class="col-md-3 defaults">
						<figure class="ibadge fpurple mini">
							<i class="fa fa-eye"></i>
						</figure>
						<h1 data-appear="bounceInLeft">Desarrollo Interactivo</h1>
					</div>
					<div class="col-md-9 defaults">
						<div class="row">
							<div class="col-md-6">
								<p data-appear="bounceInLeft">La evolución tecnológica está más activa que nunca; nuevas experiencias se van creando y los entornos virtuales son más tangibles que nunca.</p>
								<p data-appear="bounceInLeft">La <em>Innovación Tecnológica</em> es mi especialidad, investigar, crear y desarrollar cosas que el ojo humano no ha visto jamás. Son desarrollos dignos de museos tecnológicos; dos de ellos son mis clientes: <a href="http://w.explora.edu.mx/">Explora, Centro de Ciencias</a> y el <a href="http://museuculturesmon.bcn.cat/es">Museu de Cultures del Món</a> de Barcelona.</p>
							</div>
							<div class="col-md-6" data-appear="bounceInRight">
								<h2>Algunos Skilss</h2>
								<ul class="descriptions">
									<li>Game Desing</li>
									<li>Augmented Reality</li>
									<li>Virtual Reality</li>
									<li>Innovations</li>
									<li>Analytics</li>
								</ul>
								<ul class="skills">
									<li>Unity3D</li>
									<li>Maya</li>
									<li>LeapMotion</li>
									<li>Kinect</li>
									<li>CardBoard</li>
									<li>Metaio</li>
									<li>Vuforia</li>
									<li>Arduino</li>
									<li>Oculus Rift</li>
									<li>Sensors</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Platform -->
	<div class="parallax" style="background-image: url('{{URL::asset('/home/img/bg/platforms.jpg')}}');">
		<div class="overlay">
			<div class="container">
				<div class="row">
					<div class="col-md-3 defaults">
						<figure class="ibadge fpurple mini">
							<i class="fa fa-cog"></i>
						</figure>
						<h1 data-appear="bounceInLeft">Plataformas</h1>
					</div>
					<div class="col-md-9 defaults">
						<div class="row">
							<div class="col-md-6">
								<p data-appear="bounceInLeft">Todo desarrollo necesita una base de control, un lugar donde operen todas las funciones que serán requeridas por todos los desarrollos. Este tipo de desarrollos nunca es visible para los usuarios comunes sin embargo, interactúan con ellos más de lo ellos esperan.</p>
								<p data-appear="bounceInLeft">El desarrollo y administración del lado del servidor ha sido lo más solicitado en mi carrera como tecnólogo. Clientes como los ya mencionados y actualmente una empresa en crecimiento (<a href="http://www.hotstreet.io">Hotstreet LTD</a>) hacen notar mi experiencia en el campo y la importancia de este tipo de desarrollo en el mundo.</p>
								<p data-appear="bounceInLeft">Si alguna vez <em>Skynet</em> llegase a existir, seré yo quien lo haya desarrollado.</p>
							</div>
							<div class="col-md-6" data-appear="bounceInRight">
								<h2>Algunos Skilss</h2>
								<ul class="descriptions">
									<li>Backend Develoment</li>
									<li>REST Full API</li>
									<li>Websockets</li>
									<li>Data Bases/Big Data</li>
									<li>Sysadmin/Security</li>
									<li>Cloud Services</li>
								</ul>
								<ul class="skills">
									<li>PHP</li>
									<li>NodeJS</li>
									<li>Python</li>
									<li>Java</li>
									<li>MySQL</li>
									<li>MongoDB</li>
									<li>Amazon WS</li>
									<li>Google AppEngine/Firebase</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop
