@extends('errors/template')
@section('content')
<!-- Title -->
<h1 class="push-5">{{$header}}</h1>
<h2 class="h5 push-30">{{$content}}</h2>
<!-- END Title -->

<!-- Subscribe Form -->
<form class="form-inline push-10" action="base_pages_coming_soon.html" method="post">
	<div class="form-group">
		<label class="sr-only" for="subscribe-email">Correo electrónico</label>
		<input class="form-control" type="email" id="subscribe-email" name="subscribe-email" placeholder="Tu Email..">
	</div>
	<div class="form-group">
		<button class="btn btn-default" type="submit"><i class="fa fa-plus"></i> Suscríbete</button>
	</div>
</form>
<small class="push-20">No te preocupes, odiamos el spam.</small>
<div class="push-20"></div>
<!-- END Subscribe Form -->
@stop