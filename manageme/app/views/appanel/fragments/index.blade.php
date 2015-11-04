@extends('appanel/template')

@section('breadcrumb')
<li><a href="{{route('appanel')}}">Inicio</a></li>
<li class="active">Fragmentos</li>
@stop
@section('content')
<div class="content">
	<div class="btn-group">
		<a href="{{route('appanel.fragments.create')}}" class="btn btn-default" role="button">Nuevo fragmento</a>
	</div>
</div>

<div class="content">
	<div class="row">
	@foreach($fragments as $fragment)
		<div class="col-sm-6 col-lg-3">
			<div class="block block-bordered">
                <div class="block-header">
                    <ul class="block-options">
                        <li><a href="{{route('appanel.fragments.edit', array('id' => $fragment->uid))}}"><i class="si si-pencil"></i></a></li>
                        <li><a href="{{route('appanel.fragments.destroy', array('id' => $fragment->uid))}}" class="trash-note"><i class="si si-trash text-danger"></i></a></li>
                    </ul>
                    <h3 class="block-title">{{$fragment->uid}}</h3>
                </div>
                <div class="block-content">
                    <p>{{$fragment->description}}</p>
                </div>
            </div>
        </div>
    @endforeach
	</div>
</div>
@stop