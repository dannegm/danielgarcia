@extends('appanel/template')

@section('breadcrumb')
		<li class="active">Inicio</li>
@stop
@section('content')
<div class="content">

	<div class="btn-toolbar">
		@if(Auth::user()->permissions()->users->create)
		<a href="{{route('appanel.user.create')}}" class="btn btn-default" role="button">Nuevo usuario</a>
		@endif
		@if(Auth::user()->permissions()->notes->create)
		<a href="{{route('appanel.notes.create')}}" class="btn btn-default" role="button">Nueva nota</a>
		@endif
	</div>

</div>
@stop






