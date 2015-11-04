@extends('appanel/template')

@section('breadcrumb')
<li><a href="{{route('appanel')}}">Inicio</a></li>
<li class="active">Anuncios</li>
@stop
@section('content')
<div class="content">
	<div class="btn-group">
		<a href="{{route('appanel.advertises.create')}}" class="btn btn-default" role="button">Nuevo anuncio</a>
	</div>
</div>

<div class="content">
	<div class="row">
	@foreach($advertises as $advertise)
		<div class="col-sm-6 col-lg-3">
			<div class="block block-bordered">
                <div class="block-header">
                    <ul class="block-options">
                        <li><a href="{{route('appanel.advertises.edit', array('id' => $advertise->uid))}}"><i class="si si-pencil"></i></a></li>
                        <li><a href="{{route('appanel.advertises.destroy', array('id' => $advertise->uid))}}" class="trash-note"><i class="si si-trash text-danger"></i></a></li>
                    </ul>
                    <h3 class="block-title">{{$advertise->name}}</h3>
                </div>
                <div class="block-content block-content-mini block-content-full bg-gray-lighter">
                    <div class="text-center text-muted"><a href="#">{{$advertise->space->description}}</a></div>
                </div>
                <div class="block-content">
                    <p>{{$advertise->description}}</p>
                </div>
            </div>
        </div>
    @endforeach
	</div>
</div>
@stop