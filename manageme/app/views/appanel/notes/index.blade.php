@extends('appanel/template')

@section('breadcrumb')
<li><a href="{{route('appanel')}}">Inicio</a></li>
<li class="active">Notas</li>
@stop
@section('content')
<div class="content">
	<div class="btn-group">
		@if(Auth::user()->permissions()->notes->create)
		<a href="{{route('appanel.notes.create')}}" class="btn btn-default" role="button">Nueva nota</a>
		@endif
	</div>
</div>

<div class="content">
	<div class="row">

	@foreach($notes as $note)
		<div class="col-sm-6 col-lg-3">
			<div class="block block-bordered" {{$note->draft != 0 ? 'style="opacity: 0.6; background: #fafafa;"' : ''}}">
                <div class="block-header">
                    <ul class="block-options">
                        <li><a href="{{route('appanel.notes.view', array('id' => $note->uid))}}"><i class="si si-eye"></i></a></li>
                        @if(Auth::user()->permissions()->notes->edit)
                        <li><a href="{{route('appanel.notes.edit', array('id' => $note->uid))}}"><i class="si si-pencil"></i></a></li>
                        @endif
                        @if(Auth::user()->permissions()->notes->delete)
                        <li><a href="{{route('appanel.notes.destroy', array('id' => $note->uid))}}" class="trash-note"><i class="si si-trash text-danger"></i></a></li>
                        @endif
                    </ul>
                    <ul class="block-options block-options-left">
                    	@if(Auth::user()->permissions()->notes->edit)
                        	@if($note->draft != 0)
                        	<li><span class="label label-danger">Borrador</span></li>
                        	@else
	                    		@if($note->marker != 0)
	                        	<li><a href="{{route('appanel.notes.umark', array('id' => $note->uid))}}"><i class="fa fa-bookmark text-warning"></i></a><li>
	                        	@else
	                        	<li><a href="{{route('appanel.notes.mark', array('id' => $note->uid))}}"><i class="fa fa-bookmark-o"></i></a><li>
	                        	@endif
                        	@endif
                            @if($note->youtube_id != '')
                                <li><i class="fa fa-youtube-play text-danger"></i><li>
                            @endif
                        @endif
                    </ul>
                </div>
				<div id="img_cover" class="img-container" style="height: 100px; background: #444 center no-repeat; background-size: cover;
					background-image: url('{{URL::asset('/pictures/small/' . $note->cover->url)}}');">
					<div class="img-options" style="opacity: 1;">
						<div class="img-options-content">
							<h4 class="h5 font-w400 text-white-op push-15 push-20-l push-20-r">{{$note->title}}</h4>
						</div>
					</div>
				</div>
                <div class="block-content block-content-mini block-content-full bg-gray-lighter">
                    <div class="text-center text-muted"><a href="#">{{$note->category->name}}</a></div>
                </div>
            	<ul class="nav-users">
            	<li><a href="{{route('appanel.user.edit', array('id' => $note->author->uid))}}">
                    <img class="img-avatar img-avatar42" src="{{URL::asset('/pictures/sqm/' . $note->author->picture->url)}}" alt="">
                    <i class="fa fa-circle text-success"></i> {{$note->author->name}}
                    <div class="font-w400 text-muted"><small>{{$note->publishHumanDate()}}</small></div>
                </a></i>
               	</ul>
            </div>
        </div>
    @endforeach

        <div class="col-xs-12">
            <div class="pagination">{{$notes->links()}}</div>
        </div>
	</div>
</div>
@stop