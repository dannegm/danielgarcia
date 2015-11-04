@extends('appanel/template')

@section('breadcrumb')
<li><a href="{{route('appanel')}}">Inicio</a></li>
<li class="active">Usuarios</li>
@stop
@section('content')
<div class="content">
	<div class="btn-group">
		@if(Auth::user()->permissions()->users->create)
		<a href="{{route('appanel.user.create')}}" class="btn btn-default" role="button">Nuevo usuario</a>
		@endif
	</div>
</div>

<div class="content">
	<div class="row">
	@foreach($users as $u)
		<div class="col-sm-6 col-md-4 col-lg-3">
			<a class="block block-link-hover2" href="{{route('appanel.user.edit', array('id' => $u->uid))}}">
				<div class="block-content block-content-full text-center bg-image">
					<img class="img-avatar img-avatar96 img-avatar-thumb" src="{{URL::asset('/pictures/sq/' . $u->picture->url)}}">
				</div>
				<div class="block-content block-content-full text-center">
					<div class="font-w600 push-5">{{$u->name}}</div>
					<div class="text-muted">{{"@" . $u->username}}</div>
				</div>
			</a>
		</div>
	@endforeach
	</div>
</div>
@stop