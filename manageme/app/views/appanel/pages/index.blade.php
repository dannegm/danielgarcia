@extends('appanel/template')

@section('breadcrumb')
<li><a href="{{route('appanel')}}">Inicio</a></li>
<li class="active">Páginas</li>
@stop
@section('content')
<div class="content">
	<div class="btn-group">
		<a href="{{route('appanel.pages.create')}}" class="btn btn-default" role="button">Nueva página</a>
	</div>
</div>

<div class="content">
	<div class="row">

	@foreach($pages as $page)
		<div class="col-sm-6 col-lg-3">
			<div class="block block-bordered">
                <div class="block-header">
                    <ul class="block-options">
                        <li><a href="{{route('page.page', array('uid' => $page->route))}}" target="_blank"><i class="si si-eye"></i></a></li>

                        <li><a href="{{route('appanel.pages.edit', array('id' => $page->uid))}}"><i class="si si-pencil"></i></a></li>
                        <li><a href="{{route('appanel.pages.destroy', array('id' => $page->uid))}}" class="trash-page"><i class="si si-trash text-danger"></i></a></li>
                    </ul>
                    <h3 class="block-title">{{$page->title}}</h3>
                </div>
            </div>
        </div>
    @endforeach

        <div class="col-xs-12">
            <div class="pagination">{{$pages->links()}}</div>
        </div>
	</div>
</div>
@stop