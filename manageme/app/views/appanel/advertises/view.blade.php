@extends('appanel/template')

@section('breadcrumb')
	<li><a href="{{route('appanel')}}">Inicio</a></li>
	<li><a href="{{route('appanel.notes.index')}}">Notas</a></li>
	<li>Vista previa</li>
	<li class="active">{{$note->uid}}</li>
@stop

@section('styles')
<style>
	#content img {
		display: block !important;
		width: 100% !important;
	}
</style>
@stop

@section('scripts')
	@if($note->youtube_id != '')
	<script>
	var prewviewYT = function (youtube_id) {
		var API_KEY = 'AIzaSyBQhzgkqN3Zq06VyXbX0ohSu5mBJOX96O0';
		var youtubeAPI = 'https://www.googleapis.com/youtube/v3/videos?id=[[youtubeID]]&key=[[API_KEY]]&part=snippet,status'.replace('[[youtubeID]]', youtube_id).replace('[[API_KEY]]', API_KEY);
		if (youtubeAPI != '') {
			$.get(youtubeAPI, function (res) {
				if (res.items.length > 0) {
					item = res.items[0];
					$('#yt-cover').attr('src', item.snippet.thumbnails.default.url);
					$('#yt-title').text(item.snippet.title);
					$('#yt-description').text(item.snippet.description.substring(0,255));

					if (item.status.embeddable) {
						$('#yt-status').text('Puede reproducirse').removeClass('label-danger').addClass('label-success');
					} else {
						$('#yt-status').text('No puede reproducirse').removeClass('label-success').addClass('label-danger');
					}
					$('#yt-content').fadeIn();
				} else {
					$('#yt-content').hide();
				}
			});
		} else {
			$('#yt-content').hide();
		}
	};
	$(function () {
		prewviewYT('{{$note->youtube_id}}');
	});
	</script>
	@endif
@stop

@section('content')
	<div class="content">
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<div class="block">
					<div class="block-header bg-gray-lighter">
						<ul class="block-options">
							@if(Auth::user()->permissions()->notes->edit)
	                        <li><a href="{{route('appanel.notes.edit', array('id' => $note->uid))}}"><i class="si si-pencil"></i></a></li>
	                        @endif
	                        @if(Auth::user()->permissions()->notes->delete)
	                        <li><a href="{{route('appanel.notes.destroy', array('id' => $note->uid))}}" class="trash-note"><i class="si si-trash text-danger"></i></a></li>
	                        @endif
						</ul>
						<h3 class="block-title">
                    		@if($note->marker != 0)
                        		<i class="fa fa-bookmark text-warning"></i>
                        	@else
                        		<i class="fa fa-bookmark-o"></i>
                        	@endif
							Artículo <code>{{$note->uid}}</code>
						</h3>
					</div>
					<div id="img_cover" class="img-container" style="height: 250px; background: #444 center no-repeat; background-size: cover;
						background-image: url('{{route('appanel.picture.uid', array('uid' => $note->cover_uid))}}');">
					</div>
					<div class="block-content border-b">
						<div class="row">
							<div class="col-md-6 col-sm-8">
				            	<ul class="nav-users">
				            		<li>
					            		<a href="{{route('appanel.user.edit', array('id' => $note->author->uid))}}">
						                    <img class="img-avatar img-avatar42" src="{{URL::asset('/pictures/sqm/' . $note->author->picture->url)}}" alt="">
						                    <i class="fa fa-circle text-success"></i> {{$note->author->name}}
						                    <div class="font-w400 text-muted"><small>{{'@' . $note->author->username}}</small></div>
						                </a>
						            </li>
				               	</ul>
				            </div>
							<div class="col-md-6 col-sm-4">
				            	<div class="row text-uppercase pull-right push-20-r push-10-t">
		                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> {{$note->publishHumanDate()}}</small></div>
		                            <div class="text-muted animated fadeIn"><small><i class="si si-grid"></i> {{$note->category->name}}</small></div>
			                    </div>
				            </div>
				        </div>
					</div>
					<div class="block-content">
						<h2>{{$note->title}}</h2>
						
						@if($note->youtube_id != '')
						<hr />
						<div class="push-10-t row" style="display: none;" id="yt-content">
							<div class="col-xs-3">
								<img id="yt-cover" class="img-responsive" />
							</div>
							<div class="col-xs-9">
								<h1 class="h4" id="yt-title"></h1>
								<p><span id="yt-description"></span>
									<br /><span class="label" id="yt-status"></span>
										<a href="https://www.youtube.com/watch?v={{$note->youtube_id}}">https://www.youtube.com/watch?v={{$note->youtube_id}}</a>
								</p>
							</div>
						</div>
						<hr />
						@endif

						<br><br>
						<blockquote>{{$note->description}}</blockquote>

						<div id="content" style="text-align: justify;">{{$note->content}}</div>
					</div>
					<div class="block-content">
						<h5><small><i class="si si-tag"></i></small> Tags</h5>
						<br>
						<?php $tags = explode(',', $note->tags); ?>
						<p>
							@foreach($tags as $tag)
							<span class="label label-info">{{$tag}}</span>
							@endforeach
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop