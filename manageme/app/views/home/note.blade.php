@extends('home/template')

@section('metas')
<meta property="og:type" content="website" />
<meta property="og:site_name" content="{{Settings::get('page.title')}}" />
<meta property="og:image" content="{{URL::asset('/pictures/normal/' . $note->cover->url)}}" />

<meta property="og:url" content="{{route('page.note', array('uid' => $note->permalink))}}" />
<meta property="og:title" content="{{$note->title}}" />
<meta property="og:description" content="{{strip_tags($note->description)}}" />
@stop

@section('scripts')
<script src="{{URL::asset('/home/js/plugins/tubeplayer/tubeplayer.min.js')}}"></script>
<script>
	$(function () {
		// Slideshow
		var youtube_item = $('#youtube-player');
		var youtube_id = youtube_item.data('youtube-id');

		youtube_item.tubeplayer({
			initialVideo: youtube_id,
			onPlayerPlaying: function () {
				$('.note-content[data-youtube-id="' + youtube_id + '"]').fadeOut();
			},
			onPlayerPaused: function() {
				$('.note-content[data-youtube-id="' + youtube_id + '"]').fadeIn();
			},
			onPlayerEnded: function() {
				$('.note-content[data-youtube-id="' + youtube_id + '"]').fadeIn();
			},
		});
		$.tubeplayer.defaults.afterReady = function($player) {
			youtube_item.tubeplayer('play');
		}

	});
</script>
@stop

@section('content')

	<section id="note">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-8 col-sm-6">
					<div class="row">
						<div class="col-lg-12">

							<article class="note note-self">
								<h1>{{$note->title}}</h1>
								<div class="note-cover"
									style="background-image: url('{{URL::asset('/pictures/normal/' . $note->cover->url)}}');">
									@if($note->youtube_id != '')
									<div class="youtube-player" id="youtube-player" data-youtube-id="{{$note->youtube_id}}"></div>

									@endif
								</div>
								<div class="p">
									{{$note->content}}
								</div>
								<div class="nav-social">
									<a data-role="share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('page.note', array('uid' => $note->permalink))}}&title={{$note->title}}" title="{{$note->title}}" date-network="facebook"><i class="fa fa-facebook"></i></a>
									<a data-role="share" target="_blank" href="https://twitter.com/home?status={{$note->title}}%20{{route('page.note', array('uid' => $note->permalink))}}" title="{{$note->title}}" date-network="twitter"><i class="fa fa-twitter"></i></a>
								</div>
							</article>

							<?php $space_6 = Space::get('note.bottom.medium'); ?>
							@if($space_6->taken())
							<?php $ads = $space_6->advertise; ?>
								<style>
									{{$ads->css}}
								</style>
								<script>
									{{$ads->js}}
								</script>
								<div class="ad-medium">
									{{$ads->html}}
								</div>
							@endif

							<div id="disqus_thread"></div>
							<script type="text/javascript">
								var disqus_shortname = 'antena305';
								(function() {
									var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
									dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
									(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
								})();
							</script>
							<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>

						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-4 col-sm-6">
					@include('home/sidebar')
				</div>

			</div>
		</div>
	</section>


@stop
